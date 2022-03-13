<?php

namespace App\Http\Livewire\Administracion;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;
    public $search = '';
    public $sortField;
    public $sortDirection;

    public $name, $selected_id, $permisions = array();

    public bool $updateRol = false;
    public bool $createRol = false;
    public bool $deleteRol = false;

    protected $queryString = ['sortField', 'sortDirection'];

    protected $rules = [
        'name' => ['required','string','min:4'],
    ];

    public function sortBy($field)
    {
        if($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.roles.index',[
            'roles' => Role::search('name',$this->search)->sortBy($this->sortField, $this->sortDirection)->paginate(10),
            'permisos' => Permission::all(),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->validate($this->rules);
        $data = [
            'name' => $this->name,
            'guard_name' => 'web',
        ];
        $permiso = Role::create($data);
        $permiso->syncPermissions($this->permisions);
        session()->flash('message', 'Ro creado exitosamente');
        $this->createRol = false;
        $this->resetInput();
        $this->resetPage();
    }

    public function getUser(Role $permiso, $tipo)
    {
        $this->selected_id = $permiso->id;
        $this->name = $permiso->name;

        if($tipo === 'update'){
            $this->updateRol = true;
        }else{
            $this->deleteRol = true;
        }
    }

    public function update()
    {
        $this->validate($this->rules);
        $permiso = Role::findOrFail($this->selected_id);
        $data = [
            'name' => $this->name,
            'guard_name' => 'web',
        ];

        $permiso->update($data);
        $permiso->syncPermissions($this->permisions);
        $this->resetInput();
        session()->flash('message', 'Ro actualizado exitosamente');
        $this->updateRol = false;
        $this->resetPage();
    }


    public function delete()
    {
        $permiso = Role::findOrFail($this->selected_id);
        $permiso->delete();
        session()->flash('message', 'Ro eliminado exitosamente');
        $this->deleteRol = false;
        $this->resetInput();
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->selected_id = null;
        $this->permisions = array();
    }
}
