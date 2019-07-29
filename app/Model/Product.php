<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = ['name', 'sku', 'categoryId'];

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    public function productInformation(){
        return $this->hasOne('App\Model\ProductInformation', 'productId');
    }

    public static function getProductInformation($id){
        $product = Product::with('category')
            ->with('productInformation')
            ->get()
            ->where('categoryId', $id);
        return $product;
    }

    public static function addProduct($data){
        $product = Product::create($data);
        return $product;
    }

}
