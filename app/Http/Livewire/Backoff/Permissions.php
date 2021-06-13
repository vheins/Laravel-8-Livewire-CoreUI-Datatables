<?php

namespace App\Http\Livewire\Backoff;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    public $permissions, $name, $permission_id, $updateMode, $isBulk;

    protected $listeners = ['view','edit'];

    public function render()
    {
        return view('backoff.permission.index');
    }

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function store()
    {
        $bulks = ['index','create','view','edit','delete'];
        $validated = $this->validate([
            'name' => 'required',
        ]);
        if($this->isBulk){
            foreach($bulks as $bulk){
                $data = ['name' => $this->name.'-'.$bulk];
                Permission::firstOrCreate($data);
            }
        } else {
            Permission::firstOrCreate($validated);
        }
        $this->resetInputFields();
        $this->dispatchBrowserEvent('swal', [
            'type' => 'success',
            'message' => "Permission " . $this->name . " Add Successfully!!"
        ]);
    }

    public function view($id)
    {
        $permission = Permission::where('id',$id)->first();
        $this->permission_id = $id;
        $this->name = $permission->name;
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $permission = Permission::where('id',$id)->first();
        $this->Permission_id = $id;
        $this->name = $permission->name;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
        ]);

        if ($this->Permission_id) {
            $permission = Permission::find($this->Permission_id);
            $permission->update([
                'name' => $this->name,
            ]);
            $this->updateMode = false;
            //session()->flash('message', 'Permissions Updated Successfully.');
            $this->resetInputFields();
        }
    }
}
