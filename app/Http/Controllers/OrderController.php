<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OrdersDataTable;

class OrderController extends Controller
{
    public function index(OrdersDataTable $dataTable)
    {
        return $dataTable->render('orders.order-list', [
            'pageTitle' => 'Order List',
        ]);
    }
    public function view($id)
    {
        $order = \App\Models\Order::with(['items.product', 'address'])->findOrFail($id);

        if (!$order->address) {
            \Log::warning("Order {$id} has no address. Address ID: " . $order->address_id);
        }

        $items = $order->items->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'product_name' => $item->product->name ?? 'Product',
                'quantity' => $item->quantity,
                'image' => $item->product->image ?? null,
                'unit_price' => $item->unit_price,
                'subtotal' => $item->subtotal,
            ];
        });

        $orderData = [
            'id' => $order->id,
            'status' => $order->status,
            'payment_method' => $order->payment_method,
            'shipping_fee' => $order->shipping_fee,
            'total' => $order->total,
            'eta' => $order->eta,
            'created_at' => $order->created_at,
            'items' => $items,
            'subtotal' => $items->sum('subtotal'),
            'shipping' => $order->address ? [
                'name' => $order->address->full_name,
                'phone' => $order->address->phone,
                'address1' => $order->address->address,
                'address2' => collect([
                    $order->address->unit_number,
                    $order->address->barangay,
                    $order->address->city,
                    $order->address->province,
                ])->filter()->join(', '),
                'type' => $order->address->type,
            ] : null,
        ];

        return view('orders.order', ['orderData' => (object) $orderData]);
    }


}
