<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {

            $orders = Order::with('customer')
                ->latest()
                ->get();

        } else {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer) {
                return back()->withErrors([
                    'customer' => 'Customer profile not found.'
                ]);
            }

            $orders = Order::with('customer')
                ->where('customer_id', $customer->id)
                ->latest()
                ->get();
        }

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        if (auth()->user()->role === 'admin') {

            $customers = Customer::all();

            return view('orders.create', compact('customers'));
        }

        return view('orders.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role === 'admin') {

            $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'order_date' => 'required|date',
                'discount' => 'nullable|numeric|min:0',
                'status' => 'required|string',
            ]);

            Order::create([
                'customer_id' => $request->customer_id,
                'order_date' => $request->order_date,
                'total_amount' => 0,
                'discount' => $request->discount ?? 0,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.orders.index')
                ->with('success', 'Order created successfully.');
        }

        $request->validate([
            'order_date' => 'required|date',
            'discount' => 'nullable|numeric|min:0',
            'status' => 'required|string',
        ]);

        $customer = Customer::where('email', auth()->user()->email)->first();

        if (!$customer) {
            return back()->withErrors([
                'customer' => 'Customer profile not found.'
            ]);
        }

        Order::create([
            'customer_id' => $customer->id,
            'order_date' => $request->order_date,
            'total_amount' => 0,
            'discount' => $request->discount ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $order->customer_id != $customer->id) {
                abort(403);
            }
        }

        $order->load('customer', 'orderItems');

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $order->customer_id != $customer->id) {
                abort(403);
            }

            return view('orders.edit', compact('order'));
        }

        $customers = Customer::all();

        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        if (auth()->user()->role === 'admin') {

            $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'order_date' => 'required|date',
                'discount' => 'nullable|numeric|min:0',
                'status' => 'required|string',
            ]);

            $order->update([
                'customer_id' => $request->customer_id,
                'order_date' => $request->order_date,
                'discount' => $request->discount ?? 0,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.orders.index')
                ->with('success', 'Order updated successfully.');
        }

        $customer = Customer::where('email', auth()->user()->email)->first();

        if (!$customer || $order->customer_id != $customer->id) {
            abort(403);
        }

        $request->validate([
            'order_date' => 'required|date',
            'discount' => 'nullable|numeric|min:0',
            'status' => 'required|string',
        ]);

        $order->update([
            'order_date' => $request->order_date,
            'discount' => $request->discount ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $order->customer_id != $customer->id) {
                abort(403);
            }
        }

        $order->delete();

        if (auth()->user()->role === 'admin') {

            return redirect()->route('admin.orders.index')
                ->with('success', 'Order deleted successfully.');
        }

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}