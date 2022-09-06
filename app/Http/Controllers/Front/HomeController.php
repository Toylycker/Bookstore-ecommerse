<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $discount = Product::where('discount_percent', '>', 0)
            ->where('discount_date_start', '<=', Carbon::today()->toDateString())
            ->where('discount_date_end', '>=', Carbon::today()->toDateString())
            ->where('stock', '>', 0)
            ->with(['category'])
            ->inRandomOrder()
            ->take(6)
            ->get([
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ]);

        $bestseller = Product::where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('sold', 'desc')
            ->take(6)
            ->get([
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ]);

        $popular = Product::where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('viewed', 'desc')
            ->take(6)
            ->get([
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ]);

        $recommend = Product::where('stock', '>', 0)
            ->with(['category'])
            ->orderBy('favorited', 'desc')
            ->take(6)
            ->get([
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ]);

        $new = Product::where('created_at', '>=', Carbon::today()->subMonth()->toDateString())
            ->where('stock', '>', 0)
            ->with(['category'])
            ->inRandomOrder()
            ->take(6)
            ->get([
                'id', 'category_id', 'name', 'image', 'price', 'discount_percent', 'discount_date_start', 'discount_date_end',
                'sold', 'viewed', 'favorited', 'searched', 'created_at',
            ]);

        return view('front.home.index', [
            'discount' => $discount, # discount
            'bestseller' => $bestseller, # sold
            'popular' => $popular, # viewed
            'recommend' => $recommend, # favorited
            'new' => $new, # created_at
        ]);
    }


    public function about() {
        return view('front.home.about');
    }


    public function contact() {
        return view('front.home.contact');
    }
}
