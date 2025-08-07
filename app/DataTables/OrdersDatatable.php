<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('user_name', fn($order) => $order->user->name ?? '-')
            ->editColumn('total', fn($order) => '₱' . number_format($order->total, 2))
            ->editColumn('order_date', fn($order) => $order->order_date ? $order->order_date->format('Y-m-d') : '-')
            ->editColumn('status', fn($order) => ucfirst($order->status ?? 'pending'))
            ->addColumn('action', function ($order) {
                $showUrl =  route('orders.order', $order->id); // Update this later when route is ready
                return '<a href="' . $showUrl . '"  class="btn btn-sm btn-primary">View</a>';
            })
            ->rawColumns(['action']);
    }

    public function query()
    {
        return Order::with(['user']); // Removed 'address' relationship
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('orders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row mb-3"<"col-md-6"B><"col-md-6"f>>rt<"row mt-3"<"col-md-6"i><"col-md-6"p>>')
            ->orderBy(0)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
            ]);
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('user_name')->title('Customer Name'),
            Column::make('payment_method')->title('Payment'),
            Column::make('total')->title('Total'),
            Column::make('status'),
            Column::make('order_date')->title('Order Date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Orders_' . date('YmdHis');
    }
}
