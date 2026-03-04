<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('user')
            ->when($request->status, fn($q, $status) => $q->where('status', $status))
            ->when($request->search, fn($q, $search) => $q->where(function($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%");
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.orders', compact('orders'));
    }

    public function show($id)
    {
        return view('admin.order-show', [
            'order' => Order::with(['items', 'user'])->findOrFail($id)
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:new,processing,completed,cancelled'
        ]);

        Order::findOrFail($id)->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Статус заказа обновлен');
    }
}