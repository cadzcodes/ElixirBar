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
        return view('orders.order', ['id' => $id]);
    }
}
