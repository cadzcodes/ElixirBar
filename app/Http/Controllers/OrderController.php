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
        $order = \App\Models\Order::with(['items.product', 'address', 'user'])->findOrFail($id);

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

        $statusDate = match ($order->status) {
            'Delivered' => $order->completed_at,
            'To Ship' => $order->to_ship_at,
            'To Receive' => $order->to_receive_at,
            default => $order->order_date,
        };

        // Determine available actions
        $actions = match ($order->status) {
            'Order Placed' => [
                ['label' => 'Cancel Order', 'class' => 'btn-danger', 'action' => route('orders.cancel', $order->id)],
                ['label' => 'Approve Shipping', 'class' => 'btn-primary', 'action' => route('orders.approveShipping', $order->id)],
            ],
            'To Ship' => [
                ['label' => 'Process Delivery', 'class' => 'btn-primary', 'action' => route('orders.processDelivery', $order->id)],
            ],
            'To Receive' => [
                ['label' => 'Complete Order', 'class' => 'btn-success', 'action' => route('orders.complete', $order->id)],
            ],
            default => [],
        };

        $orderData = [
            'id' => $order->id,
            'status' => $order->status,
            'payment_method' => $order->payment_method,
            'shipping_fee' => $order->shipping_fee,
            'total' => $order->total,
            'eta' => $order->eta,
            'created_at' => $order->created_at,
            'status_date' => $statusDate,
            'customer_name' => $order->user->name ?? 'Unknown Customer',
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
            'actions' => $actions, // Pass actions to view
        ];

        return view('orders.order', ['orderData' => (object) $orderData]);
    }


    public function cancel($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->status = 'Cancelled';
        $order->save();

        return redirect()->route('orders.order', $id)->with('success', 'Order has been cancelled.');
    }

    public function approveShipping($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->status = 'To Ship';
        $order->to_ship_at = now(); // Optional timestamp
        $order->save();

        return redirect()->route('orders.order', $id)->with('success', 'Order is now ready to ship.');
    }

    public function processDelivery($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->status = 'To Receive';
        $order->to_receive_at = now(); // Optional timestamp
        $order->save();

        return redirect()->route('orders.order', $id)->with('success', 'Order is now out for delivery.');
    }

    public function complete($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->status = 'Completed';
        $order->completed_at = now(); // Optional timestamp
        $order->save();

        return redirect()->route('orders.order', $id)->with('success', 'Order has been marked as complete.');
    }

}
