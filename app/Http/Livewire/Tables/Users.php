<?php

namespace App\Http\Livewire\Tables;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Users extends LivewireDatatable
{
    public $model = User::class;

    public function builder()
    {
        return User::query();
    }

    public function columns()
    {
        $collum = [
            NumberColumn::name('id'),
            Column::name('name')->filterable(),
            Column::name('email')->filterable(),
            Column::name('roles.name')
                ->filterable()
                ->label('Role'),
            Column::name('created_at'),
        ];

        if(auth()->user()->hasAnyPermission(['user-view','user-edit','user-delete'])){
            $collum[] = Column::callback(['id'], function ($id) {
                return view('backoff.user.action', ['id' => $id]);
            })->label('action');
        }

        return $collum;
    }
}
