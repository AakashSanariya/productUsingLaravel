<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Model
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = "product";
    /**
     * @var array
     */
    protected $fillable = ['name', 'sku', 'categoryId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productInformation(){
        return $this->hasOne('App\Model\ProductInformation', 'productId', 'id');
    }

    /**
     * @param $id
     * @return static
     */
    public static function getProductInformation($id){
        $product = Product::with('category')
            ->with('productInformation')
            ->get()
            ->where('categoryId', $id);
        return $product;
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function addProduct($data){
        $product = Product::create($data);
        $productDetails = $product->productInformation()->create();
        return $product;
    }

    /**
     * @param $productInfo
     * @param $id
     * @return bool
     */
    public static function updateProductInformation($productInfo, $id){
        $product = Product::where('id', $id)
            ->update([
                'name' => $productInfo['product']['name'],
                'sku' => $productInfo['product']['sku']
            ]);
        $productInfoUpdate = ProductInformation::where('productId', $id)
            ->update([
                'price' => $productInfo['product']['price'],
                'manuCity' => $productInfo['product']['manuCity'],
                'pincode' => $productInfo['product']['pincode'],
                'gstNo' => $productInfo['product']['gstNo'],
                'mrp' => $productInfo['product']['mrp'],
                'batchNo' => $productInfo['product']['batchNo'],
                'weight' => $productInfo['product']['weight']
            ]);
        return true;
    }
    
}
