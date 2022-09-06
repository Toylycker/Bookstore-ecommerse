<div class="container-lg py-3">
    <div class="d-flex justify-content-between align-items-center border-bottom py-2 mb-3">
        <a href="#" class="d-block h4 mb-0 link-danger">@lang('front.populars')</a>
        <a href="#" class="d-block"><i class="bi bi-chevron-right"></i></a>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-3">
        @foreach($popular as $product)
            <div class="col">
                @include('front.app.product')
            </div>
        @endforeach
    </div>
</div>