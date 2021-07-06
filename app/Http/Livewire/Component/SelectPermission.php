<?php

namespace App\Http\Livewire\Component;

use Spatie\Permission\Models\Permission;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;

class SelectPermission extends LivewireSelect
{

    public function options($searchTerm = null) : Collection
    {
        return Permission::select('name as value','name as description')
        ->where('name','like','%'.$searchTerm.'%')->get();
    }

    public function selectedOption($value)
    {
        return [
            'value' => $value,
            'description' => $value
        ];
    }
}
