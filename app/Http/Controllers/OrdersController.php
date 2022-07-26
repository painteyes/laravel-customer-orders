<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Contract;
use App\Models\Tag;


use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index')->withOrders(Order::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('orders.create', compact('tags'))->withOrder(new Order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|max:100',
            'cost' => 'required|numeric|between:1, 999.99',
            'tags' => 'exists:tags,id'
        ]); 

        $order = Order::create($request->all());

        // Associate the tags with the order
        $order->tags()->sync($request->tags);

        return redirect()->route('orders.edit', $order)->withMessage('Order created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $tags = Tag::all();

        return view('orders.edit', compact('order', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // Validate form
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|max:100',
            'cost' => 'required|numeric|between:1, 999.99',
            'tags' => 'exists:tags,id'
        ]);

        $order->update($request->all());

        // Update the relations
        $order->tags()->sync($request->tags);
        
        $tags = Tag::all();

        return view('orders.edit', compact('order', 'tags'))->withMessage('Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->withMessage('Order deleted successfully');
    }
}