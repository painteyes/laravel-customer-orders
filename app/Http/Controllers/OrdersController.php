<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Contract;

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
        return view('orders.create')->withOrder(new Order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida i dati del form 
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|max:100',
            'cost' => 'required|numeric|between:1, 999.99',
        ]); 

        $order = Order::create($request->all());

        // Crea un nuovo contratto
        $contract = new Contract();
        // Asssocio il nuovo contratto all'ordine creato
        $contract->customer_id = $order->customer_id;
        $contract->order_id = $order->id;
        $contract->save();

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
        return view('orders.edit', compact('order'));
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
        $order->update($request->all());

        return view('orders.edit', compact('order'))->withMessage('Order updated successfully.');
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

        // Elimina il contratto associato
        $contract = Contract::where('order_id', $order->id);
        $contract->delete();

        return redirect()->route('orders.index')->withMessage('Order deleted successfully');
    }
}