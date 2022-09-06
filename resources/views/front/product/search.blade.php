@extends('front.layouts.app')
@section('title') @lang('front.search') @endsection
@section('content')
    <div class="container-lg py-3">
        <div class="d-block h4 text-danger border-bottom py-2 mb-3">
            <span class="text-secondary">@lang('front.search'):</span> {{ $search }}
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-3">
            @foreach($products as $product)
                <div class="col">
                    @include('front.app.product')
                </div>
            @endforeach
        </div>
        <div class="my-3">
            {{ $products->links() }}
        </div>
    </div>
@endsection