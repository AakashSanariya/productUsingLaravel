<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
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
        $category = Category::all();
        return view('addProduct', ['categoryName' => $category]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function displayRecord(Request $request)
    {
        $categoryId = $request->input('categoryId');

        $product = Product::getProductInformation($categoryId);
        return view('ajaxrecordDisplay', ['product' => $product, 'categoryId' => $categoryId]);
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
        $productDetails = Product::addProduct($request['product']);
        return redirect('/');
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
    public function edit($id)
    {
        //
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
        //
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
