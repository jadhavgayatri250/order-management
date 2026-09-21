<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();

        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'Pending')->count();

        $deliveredOrders = Order::where('status', 'Delivered')->count();

        $totalSales = Order::sum('total_amount');

        return view('admin.dashboard', compact(
            'totalCustomers',
            'totalOrders',
            'pendingOrders',
            'deliveredOrders',
            'totalSales'
        ));
    }

public function pendingOrders()
{
    $orders = Order::with('customer')
        ->where('status', 'Pending')
        ->latest()
        ->get();

    return view('admin.pending-orders', compact('orders'));
}
public function deliveredOrders()
{
    $orders = Order::with('customer')
        ->where('status', 'Delivered')
        ->latest()
        ->get();

    return view('admin.delivered-orders', compact('orders'));
}
public function reports()
{
    $totalCustomers = Customer::count();

    $totalOrders = Order::count();

    $pendingOrders = Order::where('status', 'Pending')->count();

    $confirmedOrders = Order::where('status', 'Confirmed')->count();

    $shippedOrders = Order::where('status', 'Shipped')->count();

    $deliveredOrders = Order::where('status', 'Delivered')->count();

    $cancelledOrders = Order::where('status', 'Cancelled')->count();

    $totalSales = Order::sum('total_amount');

    return view('admin.reports', compact(
        'totalCustomers',
        'totalOrders',
        'pendingOrders',
        'confirmedOrders',
        'shippedOrders',
        'deliveredOrders',
        'cancelledOrders',
        'totalSales'
    ));
}
}