<?php

namespace App\DataTables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable(QueryBuilder $query) : EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', '')
            ->addColumn('picture' ,function (Employee $employee) {
                return '<img src="' . $employee->picture . '" width="50" height="50" class="rounded-circle">';
            })
            ->addColumn('status', function (Employee $employee){
                if($employee->is_blocked){
                    return ' <span class="badge badge-sm bg-gradient-danger">Blocked</span>';
                }
                return ' <span class="badge badge-sm bg-gradient-success">aktif</span>';
            })
            ->addColumn('name', function (Employee $employee){
              return '
              <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">'.$employee->firstname.'</h6>
                                                <p class="text-xs text-secondary mb-0">'.$employee->email.'</p>
              </div>
              ';
            })
            ->addColumn('email', function (Employee $employee){

            })
            ->rawColumns(['action', 'picture', 'status','name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model) : QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('employees-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('PBfrtip')
//                    ->dom('Bfrtip')
                    ->orderBy(1)
//                    ->editors([
//                        Editor::make()
//                            ->fields([
//                                Fields\Text::make('picture'),
//                                Fields\Text::make('email'),
//                            ])
//                    ])
                    ->buttons([
                        Button::make('create')->editor('editor'),
                        Button::make('edit')->editor('editor'),
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ])
            ->parameters([
                'buttons' => ['export', 'print', 'reset', 'reload'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() : array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('picture'),
            Column::make('id'),
            Column::make('name'),
            Column::make('username'),
            Column::make('phone'),
            Column::make('status'),
//            Column::make('created_at'),
//            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename():string
    {
        return 'Employees_' . date('YmdHis');
    }
}
