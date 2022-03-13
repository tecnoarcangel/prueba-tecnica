<?php

namespace App\Http\Livewire\Administracion;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Usuarios extends Component
{
    use WithPagination;
    public $search = '';
    public $sortField;
    public $sortDirection;

    public $name, $email, $password, $password_confirmation, $activo = 0, $selected_id,$role, $permisions  = array();

    public bool $updateUser = false;
    public bool $createUser = false;
    public bool $showUser = false;
    public bool $deleteUser = false;

    protected $queryString = ['sortField', 'sortDirection'];

    protected $rules = [
        'name' => ['required','string','min:4'],
        'email' => ['required','email'],
        'activo' => ['nullable'],
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
        return view('livewire.usuarios.index',[
                'usuarios' => User::search('name',$this->search)->sortBy($this->sortField, $this->sortDirection)->paginate(10),
                'roles' => Role::all(),
                'permisos' => Permission::all(),
            ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->validate($this->rules+ [
            'password' => ['required','confirmed','min:8',],
            'password_confirmation' => ['required','same:password',],
            ]);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'activo' => $this->activo
        ];
        $usuario = User::create($data);
        if($this->role){
            $usuario->syncRoles([$this->role]);
        }
        $usuario->syncPermissions($this->permisions);

        session()->flash('message', 'Usuario creado exitosamente');
        $this->createUser = false;
        $this->resetInput();
        $this->resetPage();
    }

    public function getUser(User $usuario, $tipo)
    {
        $this->selected_id = $usuario->id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->activo = $usuario->activo;
        if(isset($usuario->roles()->first()->id)){
            $this->role = $usuario->roles()->first()->id;
        }
        if($usuario->permissions()->allRelatedIds()){
            $this->permisions = $usuario->permissions()->allRelatedIds()->toArray();
        }

        if($tipo === 'update'){
            $this->updateUser = true;
        }else{
            $this->deleteUser = true;
        }
    }

    public function update()
    {
        $this->validate($this->rules+ [
            'password' => ['nullable','confirmed','min:8',],
            'password_confirmation' => ['nullable','same:password',],
            ]);
        $usuario = User::findOrFail($this->selected_id);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'activo' => $this->activo
        ];
        if($this->password && $this->password !== $usuario->password){
            $data['password'] = Hash::make($this->password);
        }
        $usuario->update($data);
        if($this->role){
            $usuario->syncRoles([$this->role]);
        }
        $usuario->syncPermissions($this->permisions);

        $this->resetInput();
        session()->flash('message', 'Usuario actualizado exitosamente');
        $this->updateUser = false;
        $this->resetPage();
    }


    public function delete()
    {
        $usuario = User::findOrFail($this->selected_id);
        $usuario->delete();
        session()->flash('message', 'Usuario eliminado exitosamente');
        $this->deleteUser = false;
        $this->resetInput();
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->password_confirmation = null;
        $this->activo = false;
        $this->selected_id = null;
        $this->role = null;
        $this->permisions = [];
    }
}
