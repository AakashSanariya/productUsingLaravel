<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductInformation;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\Console\Input\Input;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{

    /**
     * @return mixed
     */
    public function categoryDisplay()
    {
        $category = Category::pluck('name', 'id')->toArray();
        $categoryID = "NULL";
        return view('addProduct')->with(compact('category', 'categoryID'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function displayRecord(Request $request)
    {
        $categoryId = $request->input('categoryId');

        $product = Product::getProductInformation($categoryId);
        return view('ajaxrecordDisplay')->with(compact('product', 'categoryId'))->render();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'product.name' => "required|max:50",
            'product.sku' => "required|numeric",
        ]);
        $productDetails = Product::addProduct($request['product']);

        return redirect('/')->with('flash_message_success', 'Add Product Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $productInfo = ProductInformation::getProductDetails($id);
            $categoryID = $productInfo['0']['product']['categoryId'];
            $category = Category::pluck('name', 'id')->toArray();
            return view('editAjaxRecord')->with(compact('productInfo', 'categoryID', 'category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'product.name' => 'required|max:50',
            'product.sku' => 'required|numeric',
            'product.price' => 'required|numeric',
            'product.manuCity' => 'required|alpha',
            'product.pincode' => 'required|numeric|min:5',
            'product.gstNo' => 'required',
            'product.mrp' => 'required|numeric',
            'product.batchNo' => 'required',
            'product.weight' => 'required|numeric'
        ]);
        $productInfoUpdate = Product::updateProductInformation($request, $id);
        return redirect('/')->with('flash_message_success','Details Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
