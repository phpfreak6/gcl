<?php

namespace App\DataTables;

use App\Models\Pickup;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class PickupDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'pickups.datatables_actions')
            ->addColumn('set_customer', function ($query) {
                return $query->customer ? $query->customer->full_name : "";
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pickup $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pickup $model)
    {
        return $model->newQuery()->where('customer_id', auth()->user()->id)->orderBy('id', 'DESC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'bSort' => false,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner'],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-sync"></i> Reload',
                    ],
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner'],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'title' => 'Customer Name',
                'data' => 'set_customer',
            ],
            'date',
            'earliest_time',
            'latest_time',
            'courier',
            'no_packages',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pickups_' . time();
    }
}
