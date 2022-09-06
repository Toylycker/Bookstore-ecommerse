<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['discount_date_start', 'discount_date_end'];

    protected $hidden = ['pivot'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function authors()
    {
        return $this->belongsToMany(Author::class, 'product_authors');
    }


    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'product_publishers');
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function isDiscount()
    {
        if ($this->discount_percent > 0 and $this->discount_date_start <= Carbon::today()->toDateTimeString() and $this->discount_date_end >= Carbon::today()->toDateTimeString()) {
            return true;
        } else {
            return false;
        }
    }


    public function isNew()
    {
        if ($this->created_at >= Carbon::today()->subMonth()->toDateTimeString()) {
            return true;
        } else {
            return false;
        }
    }


    public function price()
    {
        if ($this->isDiscount()) {
            return round($this->price * (1 - $this->discount_percent / 100), 1);
        } else {
            return round($this->price, 1);
        }
    }
}
