<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Bookstore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbars">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">@lang('front.categories')</a>
                    <ul class="dropdown-menu overflow-scroll" aria-labelledby="dropdown01" style="max-height:25rem;">
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('category.products', $category->id) }}">
                                    {{ $category->name }}
                                    <span class="badge bg-light text-dark">{{ $category->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">@lang('front.authors')</a>
                    <ul class="dropdown-menu overflow-scroll" aria-labelledby="dropdown02" style="max-height:25rem;">
                        @foreach($authors as $author)
                            <li>
                                <a class="dropdown-item" href="{{ route('author.products', $author->id) }}">
                                    {{ $author->name }}
                                    <span class="badge bg-light text-dark">{{ $author->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">@lang('front.publishers')</a>
                    <ul class="dropdown-menu overflow-scroll" aria-labelledby="dropdown03" style="max-height:25rem;">
                        @foreach($publishers as $publisher)
                            <li>
                                <a class="dropdown-item" href="{{ route('publisher.products', $publisher->id) }}">
                                    {{ $publisher->name }}
                                    <span class="badge bg-light text-dark">{{ $publisher->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">@lang('front.brands')</a>
                    <ul class="dropdown-menu overflow-scroll" aria-labelledby="dropdown04" style="max-height:25rem;">
                        @foreach($brands as $brand)
                            <li>
                                <a class="dropdown-item" href="{{ route('brand.products', $brand->id) }}">
                                    {{ $brand->name }}
                                    <span class="badge bg-light text-dark">{{ $brand->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            <form action="{{ route('search') }}">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="q">
            </form>
        </div>
    </div>
</nav>
