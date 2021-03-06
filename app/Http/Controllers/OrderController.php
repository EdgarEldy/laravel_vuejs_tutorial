<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('customer', 'product')->paginate(10);

        return sendResponse($orders, 'Orders list');
    }

    public function getProducts(Request $request)
    {

        if ($request->has('category')) {
            $cat_id = $request->input('category');
            $products = DB::table('categories')
                ->join('products', 'products.category_id', '=', 'categories.id')
                ->where('categories.id', '=', $cat_id)
                ->get();
        }

        return sendResponse($products, 'Products list by category id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderFormRequest $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->qty = $request->qty;
        $order->total = $request->total;

        $order->save();

        return sendResponse($order, 'Order has been saved successfully !');
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

        $order = Order::findOrFail($id);
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->qty = $request->qty;
        $order->total = $request->total;

        $order->save();

        return sendResponse($order, 'Order has been updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return sendResponse($order, 'Order has been delete successfully !');
    }
}
