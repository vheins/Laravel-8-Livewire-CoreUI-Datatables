<?php

namespace App\Http\Livewire\Tables;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Roles extends LivewireDatatable
{
    public $model = Role::class;

    public function builder()
    {
        return Role::query();
    }

    public function columns()
    {
        $collum = [
            NumberColumn::name('id'),
            Column::name('name')->filterable(),
            Column::name('permissions.name')
                ->filterable()
                ->label('Permission'),

        ];

        if(auth()->user()->hasAnyPermission(['role-view','role-edit','role-delete'])){
            $collum[] = Column::callback(['id'], function ($id) {
                return view('backoff.role.action', ['id' => $id]);
            })->label('action');
        }
        return $collum;
    }
}
