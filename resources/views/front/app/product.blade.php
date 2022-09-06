<div class="position-relative">
    <a href="{{ route('product', $product->id) }}" class="d-flex justify-content-center">
        <img src="{{ asset('img/temp/product-sm.png') }}" alt="" class="img-fluid border rounded">
        @if($product->isDiscount())
            <div class="position-absolute text-light small fw-bold bg-danger rounded end-0 px-1 m-1">
                -{{ $product->discount_percent }}%
            </div>
        @endif
        @if($product->isNew())
            <div class="position-absolute text-light small fw-bold bg-warning rounded start-0 px-1 m-1">
                @lang('front.new')
            </div>
        @endif
    </a>
    <div>
        <a href="{{ route('product', $product->id) }}" class="d-block link-dark small fw-bold my-1 line-clamp-2" style="height:2.5rem;">
            {{ $product->name }}
        </a>
        <a href="{{ route('category.products', $product->category_id) }}" class="small fw-bold link-secondary">
            {{ $product->category->name }}
        </a>
        <div class="mt-auto">
            <div class="small fw-bold">
                @if($product->isDiscount())
                    <span class="text-secondary"><s>{{ number_format($product->price, 2, ".", " ") }}</s></span>
                    <span class="text-danger">{{ number_format($product->price(), 2, ".", " ") }} <small>TMT</small></span>
                @else
                    <span class="text-primary">{{ number_format($product->price, 2, ".", " ") }} <small>TMT</small></span>
                @endif
            </div>
            <div class="d-flex align-items-center text-secondary small fw-bold">
                <div class="me-3">
                    <i class="bi bi-basket-fill text-black-50"></i> {{ $product->sold }}
                </div>
                <div class="me-3">
                    <i class="bi bi-binoculars-fill text-black-50"></i> {{ $product->viewed }}
                </div>
                <div class="me-3">
                    <i class="bi bi-heart-fill text-black-50"></i> {{ $product->favorited }}
                </div>
                <div>
                    <i class="bi bi-search text-black-50"></i> {{ $product->searched }}
                </div>
            </div>
        </div>
    </div>
</div>