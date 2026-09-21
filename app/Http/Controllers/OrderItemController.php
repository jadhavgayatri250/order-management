<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {

            $orderItems = OrderItem::with('order.customer')
                ->latest()
                ->get();

        } else {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer) {
                return back()->withErrors([
                    'customer' => 'Customer profile not found.'
                ]);
            }

            $orderItems = OrderItem::with('order.customer')
                ->whereHas('order', function ($query) use ($customer) {
                    $query->where('customer_id', $customer->id);
                })
                ->latest()
                ->get();
        }

        return view('order-items.index', compact('orderItems'));
    }

    public function create(Request $request)
    {
        if (auth()->user()->role === 'admin') {

            $orders = Order::with('customer')
                ->latest()
                ->get();

            return view('order-items.create', compact('orders'));
        }

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

        return view('order-items.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $order = Order::findOrFail($request->order_id);

        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $order->customer_id != $customer->id) {
                abort(403);
            }
        }

        $subtotal = $request->quantity * $request->price;

        OrderItem::create([
            'order_id' => $request->order_id,
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'subtotal' => $subtotal,
        ]);

        $total = $order->orderItems()->sum('subtotal');

        $order->update([
            'total_amount' => $total,
        ]);

        if (auth()->user()->role === 'admin') {

            return redirect()->route('admin.orders.show', $order->id)
                ->with('success', 'Order item added successfully.');
        }

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order item added successfully.');
    }

    public function show(OrderItem $orderItem)
    {
        $orderItem->load('order.customer');

        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $orderItem->order->customer_id != $customer->id) {
                abort(403);
            }
        }

        return view('order-items.show', compact('orderItem'));
    }

    public function edit(OrderItem $orderItem)
    {
        $orderItem->load('order.customer');

        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $orderItem->order->customer_id != $customer->id) {
                abort(403);
            }

            $orders = Order::with('customer')
                ->where('customer_id', $customer->id)
                ->latest()
                ->get();

            return view('order-items.edit', compact('orderItem', 'orders'));
        }

        $orders = Order::with('customer')
            ->latest()
            ->get();

        return view('order-items.edit', compact('orderItem', 'orders'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderItem->load('order');

        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $orderItem->order->customer_id != $customer->id) {
                abort(403);
            }
        }

        $oldOrderId = $orderItem->order_id;

        $newOrder = Order::findOrFail($request->order_id);

        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $newOrder->customer_id != $customer->id) {
                abort(403);
            }
        }

        $subtotal = $request->quantity * $request->price;

        $orderItem->update([
            'order_id' => $request->order_id,
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'subtotal' => $subtotal,
        ]);

        $oldOrder = Order::find($oldOrderId);

        if ($oldOrder) {

            $oldTotal = $oldOrder->orderItems()->sum('subtotal');

            $oldOrder->update([
                'total_amount' => $oldTotal,
            ]);
        }

        $newTotal = $newOrder->orderItems()->sum('subtotal');

        $newOrder->update([
            'total_amount' => $newTotal,
        ]);

        if (auth()->user()->role === 'admin') {

            return redirect()->route('admin.orders.show', $newOrder->id)
                ->with('success', 'Order item updated successfully.');
        }

        return redirect()->route('orders.show', $newOrder->id)
            ->with('success', 'Order item updated successfully.');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->load('order');

        if (auth()->user()->role === 'customer') {

            $customer = Customer::where('email', auth()->user()->email)->first();

            if (!$customer || $orderItem->order->customer_id != $customer->id) {
                abort(403);
            }
        }

        $orderId = $orderItem->order_id;

        $orderItem->delete();

        $order = Order::find($orderId);

        if ($order) {

            $total = $order->orderItems()->sum('subtotal');

            $order->update([
                'total_amount' => $total,
            ]);
        }

        if (auth()->user()->role === 'admin') {

            return redirect()->route('admin.orders.show', $orderId)
                ->with('success', 'Order item deleted successfully.');
        }

        return redirect()->route('orders.show', $orderId)
            ->with('success', 'Order item deleted successfully.');
    }
}