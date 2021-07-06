<?php

namespace App\Http\Livewire\Tables;

use App\Models\Menu;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Menus extends LivewireDatatable
{
    public $model = Menu::class;

    public function builder()
    {
        return Menu::query();
    }

    public function columns()
    {
        $collum = [
            NumberColumn::name('id'),
            NumberColumn::name('parent_id'),
            Column::name('text')->filterable(),
            Column::name('url')->filterable(),
            Column::name('route')->filterable(),
            Column::name('can')->label('Permission')->filterable(),
        ];

        if(auth()->user()->hasAnyPermission(['menu-view','menu-edit','menu-delete'])){
            $collum[] = Column::callback(['id'], function ($id) {
                return view('backoff.menu.action', ['id' => $id]);
            })->label('action');
        }

        return $collum;
    }
}
