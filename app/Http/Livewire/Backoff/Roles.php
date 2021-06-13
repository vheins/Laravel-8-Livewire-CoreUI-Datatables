<?php

namespace App\Http\Livewire\Backoff;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{
    public $roles, $name, $role_id, $updateMode, $permissions = [], $permission;

    protected $listeners = ['view','edit'];

    public function render()
    {
        return view('backoff.role.index');
    }

    private function resetInputFields()
    {
        $this->name = null;
        $this->permission = null;
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required',
        ]);
        Role::firstOrCreate($validated);
        $this->resetInputFields();
        $this->dispatchBrowserEvent('swal', [
            'type' => 'success',
            'message' => "Role " . $this->name . " Add Successfully!!"
        ]);
    }

    public function view($id)
    {
        $this->updateMode = false;
        $this->getPermissions($id);
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->getPermissions($id);
    }

    private function getPermissions($id){
        $this->permission = null;
        $role = Role::where('id',$id)->first();
        $permissions = Permission::all();
        foreach($permissions as $perms){
            $name = explode('-',$perms->name);
            $permission[$name[0]][] = [
                'crud' => $name[1],
                //'stat' => $role->hasPermissionTo($perms->name)
            ];
            $this->permission[$perms->name] = $role->hasPermissionTo($perms->name);
        }
        $this->permissions = $permission;
        $this->role_id = $id;
        $this->name = $role->name;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $permission = [];
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        foreach($this->permission as $key => $value){
            if($value)$permission[] = $key;
        }

        if ($this->role_id) {
            $role = Role::find($this->role_id);
            $role->update([
                'name' => $this->name,
            ]);
            $role->syncPermissions($permission);
            $this->updateMode = false;
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => "Role #" . $role->name . " Update Successfully!!"
            ]);
            $this->resetInputFields();
        }
    }

}
