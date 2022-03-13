<?php

namespace App\Http\Livewire\Administracion;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permisos extends Component
{
    use WithPagination;
    public $search = '';
    public $sortField;
    public $sortDirection;

    public $name, $selected_id;

    public bool $updatePermiso = false;
    public bool $createPermiso = false;
    public bool $deletePermiso = false;

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
        return view('livewire.permisos.index',[
            'permisos' => Permission::search('name',$this->search)->sortBy($this->sortField, $this->sortDirection)->paginate(10),
        ])->layout('layouts.admin');
    }


    public function create()
    {
        $this->validate($this->rules);
        $data = [
            'name' => $this->name,
            'guard_name' => 'web',
        ];
        Permission::create($data);
        session()->flash('message', 'Permiso creado exitosamente');
        $this->createPermiso = false;
        $this->resetInput();
        $this->resetPage();
    }

    public function getUser(Permission $usuario, $tipo)
    {
        $this->selected_id = $usuario->id;
        $this->name = $usuario->name;

        if($tipo === 'update'){
            $this->updatePermiso = true;
        }else{
            $this->deletePermiso = true;
        }
    }

    public function update()
    {
        $this->validate($this->rules);
        $usuario = Permission::findOrFail($this->selected_id);
        $data = [
            'name' => $this->name,
            'guard_name' => 'web',
        ];

        $usuario->update($data);

        $this->resetInput();
        session()->flash('message', 'Permiso actualizado exitosamente');
        $this->updatePermiso = false;
        $this->resetPage();
    }


    public function delete()
    {
        $usuario = Permission::findOrFail($this->selected_id);
        $usuario->delete();
        session()->flash('message', 'Permiso eliminado exitosamente');
        $this->deletePermiso = false;
        $this->resetInput();
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->name = null;
    }
}
