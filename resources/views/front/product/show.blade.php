@extends('front.layouts.app')
@section('title') {{ $product->name }} - {{ $product->category->name }} @endsection
@section('content')
    <div class="container-lg py-3">
        <div class="d-block h4 text-danger border-bottom py-2 mb-3">
            {{ $product->name }}
        </div>
        <div class="row g-3">
            <div class="col-sm-6 col-lg-4">
                <div class="position-relative">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/temp/product.png') }}" alt="" class="img-fluid border rounded">
                        @if($product->isDiscount())
                            <div class="position-absolute text-light fw-bold bg-danger rounded end-0 px-1 m-1">
                                -{{ $product->discount_percent }}%
                            </div>
                        @endif
                        @if($product->isNew())
                            <div class="position-absolute text-light fw-bold bg-warning rounded start-0 px-1 m-1">
                                @lang('front.new')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h2 fw-bold mb-3">{{ $product->name }}</div>
                <a href="{{ route('category.products', $product->category_id) }}" class="d-block h5 fw-bold link-secondary mb-3">{{ $product->category->name }}</a>
                @if($product->authors->count() > 0)
                    <div class="h5 fw-bold text-secondary mb-3">
                        @foreach($product->authors as $author)
                            <a href="{{ route('author.products', $author->id) }}" class="link-secondary">{{ $author->name }}</a>{{ $loop->last ? '':','}}
                        @endforeach
                    </div>
                @endif
                @if($product->publishers->count() > 0)
                    <div class="h5 fw-bold text-secondary mb-3">
                        @foreach($product->publishers as $publisher)
                            <a href="{{ route('publisher.products', $publisher->id) }}" class="link-secondary">{{ $publisher->name }}</a>{{ $loop->last ? '':','}}
                        @endforeach
                    </div>
                @endif
                @if($product->brand_id)
                    <a href="{{ route('brand.products', $product->brand_id) }}" class="d-block h5 fw-bold link-secondary mb-3">{{ $product->brand->name }}</a>
                @endif
                <div class="h5 fw-bold mb-3">
                    @if($product->isDiscount())
                        <span class="text-secondary"><s>{{ number_format($product->price, 2, ".", " ") }}</s></span>
                        <span class="text-danger">{{ number_format($product->price(), 2, ".", " ") }} <small>TMT</small></span>
                    @else
                        <span class="text-primary">{{ number_format($product->price, 2, ".", " ") }} <small>TMT</small></span>
                    @endif
                </div>
                <div class="d-flex align-items-center text-secondary fw-bold mb-3">
                    <div class="me-4">
                        <i class="bi bi-basket-fill text-black-50"></i> {{ $product->sold }}
                    </div>
                    <div class="me-4">
                        <i class="bi bi-binoculars-fill text-black-50"></i> {{ $product->viewed }}
                    </div>
                    <div class="me-4">
                        <i class="bi bi-heart-fill text-black-50"></i> {{ $product->favorited }}
                    </div>
                    <div>
                        <i class="bi bi-search text-black-50"></i> {{ $product->searched }}
                    </div>
                </div>
                @if($product->body)
                    <div class="mb-3">
                        {!! $product->body !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection