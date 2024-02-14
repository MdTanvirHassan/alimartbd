		
	@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0 text-center">Order Information</h2>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="{{ route('pathao.saveOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="storeId">Store:</label>
                            <select class="form-control" id="storeId" name="store_id" required>
                                <option value="">Select Store</option>
                                @foreach (\App\Models\Pathao_store::orderBy('name', 'asc')->get() as $store)
                                    <option value="{{ $store->store_id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="merchant_order_id">Merchant Order ID:</label>
                            <input type="text" class="form-control" id="merchant_order_id" name="merchant_order_id" placeholder="Enter Order ID" value="{{ $order->code }}" required readonly>
                        </div>
                    </div>
                </div>
            </div>
<div class="row">
                <div class="col-12 d-flex">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="contactName">Sender Name:</label>
                            <input type="text" class="form-control" id="contactName" name="contactName" placeholder="Enter contact person's name" required readonly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="contactNumber">Sender Number:</label>
                            <input type="text" class="form-control" id="contactNumber" name="contactNumber"
                                placeholder="Enter contact number" required readonly>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $Recipient = \App\Models\User::where('id',$order->user_id)->first();
                $item_quantity = \App\Models\Order::join('order_details','orders.id','order_details.order_id')->where('orders.id',$order->id)->sum('order_details.quantity');

                // $item_weight = \App\Models\Order::join('order_details','orders.id','order_details.order_id')
                // ->join('products','products.id','order_details.product_id')
                // ->where('orders.id',$order->id)
                // ->sum('products.weight');
                $item_weight = \App\Models\Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->where('orders.id', $order->id)
                ->sum(\DB::raw('products.weight * order_details.quantity'));

                if($order->payment_type!="cash_on_delivery"){
                    $amount = 0;
                }
                else{
                    $amount = $order->grand_total;
                }

            ?>
            <div class="row">
                <div class="col-12 d-flex">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="recipientName">Recipient Name:</label>
                            <input type="text" class="form-control" id="recipientName" name="recipientName" placeholder="Enter recipient person's name" value="{{ $Recipient->name}}" required readonly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="recipientNumber">recipient Number:</label>
                            <input type="text" class="form-control" id="recipientNumber" name="recipientNumber"
                                placeholder="Enter recipient's number" value="{{ $Recipient->phone}}" required readonly>
                        </div>
                    </div>
                </div>
            </div>

           
            <!-- <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="recipientName">Recipient Name:</label>
                            <input type="text" class="form-control" id="recipientName" name="recipient_name" placeholder="Enter recipient's name">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="recipientPhone">Recipient Phone:</label>
                            <input type="text" class="form-control" id="recipientPhone" name="recipient_phone" placeholder="Enter recipient's phone">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cityId">City:</label>
                            <select class="form-control" id="cityId" name="city_id">
                                <option value="">Select City</option>
                                @foreach (\App\Models\Pathao_city::orderBy('city_name', 'asc')->get() as $city)
                                    <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="zoneId">Zone:</label>
                            <select class="form-control" id="zoneId" name="zone_id">
                                <option value="">Select Zone</option>
                                {{-- Zones will be dynamically loaded here --}}
                            </select>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="areaId">Area:</label>
                            <select class="form-control" id="areaId" name="area_id">
                                <option value="">Select Area</option>
                                {{-- Area will be dynamically loaded here --}}
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea type="text" row="3" class="form-control" name="address" id="address" placeholder="Enter store address"></textarea>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="deliveryType">Delivery Type:</label>
                            <select class="form-control" id="deliveryType" name="delivery_type" required>
                                <option value="">Select Delivery Type</option>
                                <option value="48">Normal Delivery</option>
                                <option value="12">Demand Delivery</option>
                            </select>    
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="itemType">Item Type:</label>
                            <select class="form-control" id="itemType" name="item_type" required>
                                <option value="">Select Item Type</option>
                                <option value="1">Document</option>
                                <option value="2">Parcel</option>
                            </select>      
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="itemWeight">Item Weight:</label>
                            <input type="number" class="form-control" id="itemWeight" min="0.01" max="10.00" name="item_weight" placeholder="Enter item weight" value="{{$item_weight}}" required readonly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="amountToCollect">Amount to Collect:</label>
                            <input type="text" class="form-control" id="amountToCollect" name="amount_to_collect" placeholder="Enter amount to collect" value=" {{$amount}}" required readonly>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="specialInstruction">Special Instruction:</label>
                            <input type="text" class="form-control" id="specialInstruction" name="special_instruction" placeholder="Enter special instruction">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="itemQuantity">Item Quantity:</label>
                            <input type="text" class="form-control" id="itemQuantity" name="item_quantity" placeholder="Enter item quantity" value="{{$item_quantity}}" required readonly>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="itemDescription">Item Description:</label>
                            <input type="text" class="form-control" id="itemDescription" name="item_description" placeholder="Enter item description">
                        </div>
                    </div>

                    
                </div>

            </div>

            <!-- Other form fields omitted for brevity -->


                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                <a href="{{ route('all_orders.index') }}" class="btn btn-danger btn-sm">Back</a>

            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
$(document).ready(function() {
    $('#storeId').change(function () {
            var storeId = $(this).val();
            
                $.ajax({
                url: '{{ route("pathao.getinfo") }}', 
                type: 'POST', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                data: {
                    storeId: storeId 
                },
                success: function(response) {
                    $('#contactName').val(response.contact_name);
                    $('#contactNumber').val(response.contact_number);
                    // $('#secondaryContact').val(response.secondary_contact);
                },
                error: function(xhr, status, error) {
                    
                }
            });
        });

    $('#cityId').on('change', function () {

        var selectedCityId = $(this).val();
        $('#zoneId').empty();
        $('#areaId').empty();
        $.ajax({
            url: '{{ route("pathao.zone2") }}', 
            type: 'POST', 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            data: {
                cityId: selectedCityId 
            },
            success: function(response) {
                $('#zoneId').append('<option value="">Select Zone</option>');
                response.forEach(function (zone) {
                    $('#zoneId').append('<option value="' + zone.zone_id + '">' + zone.zone_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error calling route:', error);
            }
        });
    });

    $('#zoneId').on('change', function () {
        var selectedZoneId = $(this).val();
        $('#areaId').empty();
        $.ajax({
            url: '{{ route("pathao.area2") }}', 
            type: 'POST', 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            data: {
                zoneId: selectedZoneId 
            },
            success: function(response) {
                $('#areaId').append('<option value="">Select Area</option>');
                response.forEach(function (areas) {
                    $('#areaId').append('<option value="' + areas.area_id + '">' + areas.area_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error calling route:', error);
            }
        });
    });
});
</script>
@endsection
