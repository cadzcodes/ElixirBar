<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('gender', fn($row) => ucfirst($row->gender ?? '-'))
            ->editColumn('date_of_birth', fn($row) => $row->date_of_birth ? date('Y-m-d', strtotime($row->date_of_birth)) : '-')
            ->addColumn('action', function ($row) {
                $editUrl = route('users.edit', $row->id); // Ensure this route exists
                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->rawColumns(['action']);
    }

    public function query()
    {
        return User::query()
            ->where('user_type', 'user')
            ->select('id', 'name', 'email', 'phone', 'gender', 'date_of_birth');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('clients-table')
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
            Column::make('name')->title('Full Name'),
            Column::make('email'),
            Column::make('phone')->title('Phone Number'),
            Column::make('gender'),
            Column::make('date_of_birth')->title('Birth Date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'ClientList_' . date('YmdHis');
    }
}
