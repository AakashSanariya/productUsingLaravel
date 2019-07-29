<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductInformation extends Model
{
    protected $table = "productinformation";
    protected $fillable = ['price', 'manuCity', 'pincode', 'gstNo', 'mrp', 'batchNo', 'weight', 'productId'];

    public function product(){
        return $this->belongsTo('App\Model\Product');
    }
}
