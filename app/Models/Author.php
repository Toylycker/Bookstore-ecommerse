<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $hidden = ['pivot'];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_authors');
    }
}
