<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductInformation
 * @package App\Model
 */
class ProductInformation extends Model
{
    /**
     * @var string
     */
    protected $table = "productinformation";
    /**
     * @var array
     */
    protected $fillable = ['price', 'manuCity', 'pincode', 'gstNo', 'mrp', 'batchNo', 'weight', 'productId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Model\Product', 'id');
    }


    /**
     * @param $id
     */
    public static function getProductDetails($id){
        $productDetails = ProductInformation::
            with('product')
            ->where('id', $id)
            ->get()
            ->toArray();
        return $productDetails;
    }
}
