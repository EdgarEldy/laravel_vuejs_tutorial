<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get products with their categories
        $products = Product::with('category')->paginate(10);

        return sendResponse($products, 'Products list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->unit_price = $request->unit_price;

        $product->save();

        return sendResponse($product, 'Product has been created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json(array('errors' => $request->validator->getMessageBag()->toArray()));
        }

        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->unit_price = $request->unit_price;

        $product->save();

        return sendResponse($product, 'Product has been updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return sendResponse($product, 'Product has been delete successfully !');
    }
}
