<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductStock;
use App\Models\ProductTax;
use App\Models\ProductTranslation;
use App\Models\Upload;
use Artisan;
use App\Models\User;
use App\Services\ProductTaxService;
use App\Notifications\ShopProductNotification;
use Illuminate\Support\Facades\Notification;
use Auth;

use App\Services\ProductService;

use App\Services\ProductStockService;

class DigitalProductController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('seller.product.digitalproducts.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(addon_is_activated('seller_subscription')){
            if(seller_package_validity_check()){
                $categories = Category::where('digital', 1)->get();
                return view('seller.product.digitalproducts.create', compact('categories'));
            }
            else {
                flash(translate('Please upgrade your package.'))->warning();
                return back();
            }
        }
        $categories = Category::where('digital', 1)->get();
        return view('seller.product.digitalproducts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(addon_is_activated('seller_subscription')){
            if(!seller_package_validity_check()){
                flash(translate('Please upgrade your package.'))->warning();
                return redirect()->route('seller.digitalproducts');
            }
        }
        
        // Product Store
        $product = (new ProductService)->store($request->except([
            '_token', 'tax_id', 'tax', 'tax_type'
        ]));

        $request->merge(['product_id' => $product->id, 'current_stock' => 0]);

        //Product Stock
        (new ProductStockService)->store($request->only([
            'unit_price', 'current_stock', 'product_id'
        ]), $product);

        //VAT & Tax
        if ($request->tax_id) {
            (new ProductTaxService)->store($request->only([
                'tax_id', 'tax', 'tax_type', 'product_id'
            ]));
        }

        // Product Translations
        $request->merge(['lang' => env('DEFAULT_LANGUAGE')]);
        ProductTranslation::create($request->only([
            'lang', 'name', 'unit', 'description', 'product_id'
        ]));

        flash(translate('Product has been inserted successfully'))->success();


        $product->file_name = $request->file;

        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.rand(10000,99999);

        if($product->save()){
            $request->merge(['product_id' => $product->id]);
            //VAT & Tax
            if ($request->tax_id) {
                (new ProductTaxService)->store($request->only([
                    'tax_id', 'tax', 'tax_type', 'product_id'
                ]));
            }
            
            $product_stock              = new ProductStock();
            $product_stock->product_id  = $product->id;
            $product_stock->variant     = '';
            $product_stock->price       = $request->unit_price;
            $product_stock->sku         = '';
            $product_stock->qty         = 0;
            $product_stock->save();

            // Product Translations
            $product_translation                = ProductTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'product_id' => $product->id]);
            $product_translation->name          = $request->name;
            $product_translation->description   = $request->description;
            $product_translation->save();

            if(get_setting('product_approve_by_admin') == 1){
                $users = User::findMany([auth()->user()->id, User::where('user_type', 'admin')->first()->id]);
                Notification::send($users, new ShopProductNotification('digital', $product));
            }

            flash(translate('Digital Product has been inserted successfully'))->success();
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            return redirect()->route('seller.digitalproducts');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $categories = Category::where('digital', 1)->get();
        $lang = $request->lang;
        $product = Product::find($id);
        return view('seller.product.digitalproducts.edit', compact('categories', 'product', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Product Update
        $product = (new ProductService)->update($request->except([
            '_token', 'tax_id', 'tax', 'tax_type'
        ]), $product);

        //Product Stock
        foreach ($product->stocks as $key => $stock) {
            $stock->delete();
        }

        $request->merge(['product_id' => $product->id,'current_stock' => 0]);

        (new ProductStockService)->store($request->only([
            'unit_price', 'current_stock', 'product_id'
        ]), $product);

        //VAT & Tax
        if ($request->tax_id) {
            ProductTax::where('product_id', $product->id)->delete();
            (new ProductTaxService)->store($request->only([
                'tax_id', 'tax', 'tax_type', 'product_id'
            ]));
        }

        // Product Translations
        ProductTranslation::updateOrCreate(
            $request->only(['lang', 'product_id']),
            $request->only(['name', 'description'])
        );

        flash(translate('Product has been updated successfully'))->success();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_destroy = (new ProductService)->destroy($id);
        
        if ($product_destroy) {
            flash(translate('Product has been deleted successfully'))->success();
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
        } else {
            flash(translate('Something went wrong'))->error();
        }
        return back();
    }


    public function download(Request $request){
        $product = Product::findOrFail(decrypt($request->id));
        if(Auth::user()->id == $product->user_id){
            $upload = Upload::findOrFail($product->file_name);
            if (env('FILESYSTEM_DRIVER') == "s3") {
                return \Storage::disk('s3')->download($upload->file_name, $upload->file_original_name.".".$upload->extension);
            }
            else {
                if (file_exists(base_path('public/'.$upload->file_name))) {
                    return response()->download(base_path('public/'.$upload->file_name));
                }
            }
        }
        else {
            abort(404);
        }
    }
}
