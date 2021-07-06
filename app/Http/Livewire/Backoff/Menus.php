<?php

namespace App\Http\Livewire\Backoff;

use Livewire\Component;
use App\Models\Menu;

class Menus extends Component
{
    public $menus, $menu_id, $updateMode, $selectMenu;
    public $sec_no, $text, $url, $icon, $target, $badge_text, $badge_context, $badge_pill, $fa_family, $is_section, $is_route, $can, $parent_id;

    protected $listeners = ['view','edit','canUpdated' => 'setCan'];

    public function setCan($object)
    {
            $this->can = $object['value'];
    }

    public function render()
    {
        $this->selectMenu = Menu::select('id','text','url','route','is_route')->get();
        return view('backoff.menu.index');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->role = [];
    }

    public function store()
    {
        $sec_no = null;
        $validated = $this->validate([
            'text'          => 'required',
            'sec_no'        => 'nullable',
            'text'          => 'required',
            'url'           => 'nullable',
            'icon'          => 'nullable',
            'target'        => 'nullable',
            'badge_text'    => 'nullable',
            'badge_context' => 'nullable',
            'badge_pill'    => 'nullable',
            'fa_family'     => 'nullable',
            'is_section'    => 'nullable',
            'is_route'      => 'nullable',
            'can'           => 'nullable|exists:permissions,name',
            'parent_id'     => 'nullable|exists:menus,id'
            //'email' => 'required|email|unique:menus,email',
        ]);

        if($this->validate->fails()) {
            $this->dispatchBrowserEvent('swal', [
                'type' => 'error',
                'message' => "Menu " . $this->text . " Failed to Save!!"
            ]);
        }

        if($validated['is_route']){
            $validated['route'] = $validated['url'];
            unset($validated['url']);
        }

        if(is_null($validated['sec_no'])){
            if(is_null($validated['parent_id'])){
                $select = Menu::whereNull('parent_id')->orderBy('sec_no','desc')->first();
                if(!is_null($select)){
                    $sec_no = $select->sec_no;
                }
            } else {
                $select = Menu::where('parent_id',$validated['parent_id'])->orderBy('sec_no','desc')->first();
                if(!is_null($select)){
                    $sec_no = $select->sec_no;
                }
            }

            if(is_null($sec_no))$sec_no = 1;
            $validated['sec_no'] = $sec_no;
        }

        if(Menu::firstOrCreate($validated)){
            $this->dispatchBrowserEvent('swal', [
                'type' => 'success',
                'message' => "Menu " . $this->text . " Add Successfully!!"
            ]);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'type' => 'error',
                'message' => "Menu " . $this->text . " Failed to Save!!"
            ]);
        }


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
        $menu = Menu::where('id',$id)->first();
        $this->menu_id = $id;
        $this->name = $menu->name;
        $this->email = $menu->email;

        $roles = Role::all();
        foreach($roles as $role){
            $this->role[$role->name] = $menu->hasRole($role->name);
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

        if ($this->menu_id) {
            $menu = Menu::find($this->menu_id);
            $menu->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $menu->syncRoles($role);
            $this->updateMode = false;
            //session()->flash('message', 'Menus Updated Successfully.');
            $this->resetInputFields();
        }

        $this->dispatchBrowserEvent('toast', [
            'type' => 'success',
            'message' => "Menu #". $menu->id." Update Successfully!!"
        ]);
    }

}
