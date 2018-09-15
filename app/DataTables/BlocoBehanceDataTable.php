<?php

namespace App\DataTables;

use App\Models\BlocoBehance;
use Form;
use Yajra\Datatables\Services\DataTable;

class BlocoBehanceDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'bloco_behances.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $blocoBehances = BlocoBehance::query();

        return $this->applyScopes($blocoBehances);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'nomeProjeto' => ['name' => 'nomeProjeto', 'data' => 'nomeProjeto', 'orderable' => false, 'filterable' => false],
            'tipo' => ['name' => 'tipo', 'data' => 'tipo'],
            'ordem' => ['name' => 'ordem', 'data' => 'ordem'],
            'json_behance' => ['name' => 'json_behance', 'data' => 'json_behance']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'blocoBehances';
    }
}
