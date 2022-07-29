<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Tag;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index')->withOrders(Order::paginate(10))->withTags(Tag::all());
    }

    public function create()
    {
        return view('orders.create')->withOrder(new Order)->withCustomers(Customer::all())->withTags(Tag::all());
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());

        $contract = Contract::create([
            'customer_id' => $request->customer_id,
            'order_id' => $order->id,
        ]);

        $contract->save();

        return redirect()->route('orders.edit', $order)->withMessage('Order created successfully.');
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        $tags = Tag::all();

        return view('orders.edit', compact('order', 'customers', 'tags'));
    }

    public function update(Order $order, Request $request)
    {
        $order->update($request->all());
        $customers = Customer::all();
        $tags = Tag::all();

        return view('orders.edit', compact('order', 'customers', 'tags'))->withMessage('Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->withMessage('Order deleted successfully.');
    }

    // public function deleted()
    // {
    //     $orders = Order::where('deleted_at', '!=', 'NULL');
        
    //     return view('orders.deleted', compact('customers'));
    // }
}
