<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id', 'id');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_cat_id', 'id');
    }

    public function color (){
        return $this->hasMany(Color::class, 'product_id','id');
    }
    public function size (){
        return $this->hasMany(Size::class, 'product_id','id');
    }

    public function galleryImage (){
        return $this->hasMany(GalleryImage::class, 'product_id','id');
    }

    public function review (){
        return $this->hasMany(Review::class, 'product_id','id');
    }

    public function cart (){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class, 'product_id', 'id');
    }
}
