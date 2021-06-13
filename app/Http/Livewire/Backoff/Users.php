<?php

namespace App\Http\Livewire\Backoff;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public $users, $name, $email, $user_id, $updateMode, $roles = [], $role = [];

    protected $listeners = ['view','edit'];

    public function render()
    {
        return view('backoff.user.index');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->role = [];
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $validated['password'] = bcrypt('Digitama@123');

        User::firstOrCreate($validated);
        $this->dispatchBrowserEvent('swal', [
            'type' => 'success',
            'message' => "User " . $this->name . " Add Successfully!!"
        ]);

        $this->resetInputFields();
    }

    public function view($id)
    {
        $this->getRoles($id);
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->getRoles($id);
    }

    private function getRoles($id){
        $this->role = [];
        $user = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

        $roles = Role::all();
        foreach($roles as $role){
            $this->role[$role->name] = $user->hasRole($role->name);
        }
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        foreach($this->role as $key => $value){
            if($value)$role[] = $key;
        }

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $user->syncRoles($role);
            $this->updateMode = false;
            //session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
        }

        $this->dispatchBrowserEvent('toast', [
            'type' => 'success',
            'message' => "User #". $user->id." Update Successfully!!"
        ]);
    }

}
