<?php

namespace App\Http\Livewire\Tables;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Permissions extends LivewireDatatable
{
    public $model = Permission::class;

    public function columns()
    {
        $collum = [
            NumberColumn::name('id'),
            Column::name('name')->filterable(),
            Column::name('created_at'),
        ];

        if(auth()->user()->hasAnyPermission(['permission-view','permission-edit','permission-delete'])){
            $collum[] = Column::callback(['id'], function ($id) {
                    return view('backoff.permission.action', ['id' => $id]);
                })->label('action');
        }
        return $collum;
    }
}
