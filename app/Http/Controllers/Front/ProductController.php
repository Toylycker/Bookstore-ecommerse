<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['category', 'authors', 'publishers', 'brand'])
            ->findOrFail($id);
        $product->increment('viewed');

        return view('front.product.show', [
            'product' => $product,
        ]);
    }


    public function category($id)
    {
        $category = Category::findOrFail($id);

        $products = Product::where('category_id', $category->id)
            ->where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(18, [
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ], 'page');

        return view('front.product.category', [
            'category' => $category,
            'products' => $products,
        ]);
    }


    public function author($id)
    {
        $author = Author::findOrFail($id);

        $products = Product::whereHas('authors', function (Builder $query) use ($author) {
            $query->where('id', $author->id);
        })
            ->where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(18, [
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ], 'page');

        return view('front.product.author', [
            'author' => $author,
            'products' => $products,
        ]);
    }


    public function publisher($id)
    {
        $publisher = Publisher::findOrFail($id);

        $products = Product::whereHas('publishers', function (Builder $query) use ($publisher) {
            $query->where('id', $publisher->id);
        })
            ->where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(18, [
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ], 'page');

        return view('front.product.publisher', [
            'publisher' => $publisher,
            'products' => $products,
        ]);
    }


    public function brand($id)
    {
        $brand = Brand::findOrFail($id);

        $products = Product::where('brand_id', $brand->id)
            ->where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(18, [
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ], 'page');

        return view('front.product.brand', [
            'brand' => $brand,
            'products' => $products,
        ]);
    }


    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|max:30',
        ]);

        $products = Product::where('name', 'like', '%' . $request->q . '%')
            ->where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(18, [
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ], 'page')
            ->withQueryString();

        return view('front.product.search', [
            'search' => $request->q,
            'products' => $products,
        ]);
    }
}
