<div class="card-columns">
    @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $key => $first_level_id)
        <div class="card shadow-none border-0">
            <ul class="list-unstyled mb-3">
                <li class="fs-14 fw-700 mb-3">
                    <a class="text-reset hov-text-primary" href="{{ route('products.category', get_single_category($first_level_id)->slug) }}">{{ get_single_category($first_level_id)->getTranslation('name') }}</a>
                </li>
                @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($first_level_id) as $key => $second_level_id)
                    <li class="mb-2 fs-14 pl-2">
                        <a class="text-reset hov-text-primary animate-underline-primary" href="{{ route('products.category', get_single_category($second_level_id)->slug) }}">{{ get_single_category($second_level_id)->getTranslation('name') }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
