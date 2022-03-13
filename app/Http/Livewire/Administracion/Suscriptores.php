<?php

namespace App\Http\Livewire\Administracion;

use App\Models\Suscriptor;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Suscriptores extends Component
{
    use WithPagination;

    public $sortColumn = 'email';
    public $sortDirection = 'asc';
    public $searchColumns = [
        'email' => '',
        'active' => 0,
    ];
    public $suscriptor;
    public $suscriptorId;

    protected $listeners = ['delete'];

    protected $rules = [
        'suscriptor.email' => ['required','email'],
        'suscriptor.active' => 'nullable'
    ];

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
        }
    }

    public function updating($value, $name)
    {
        $this->resetPage();
    }


    public function edit($suscriptorId)
    {
        $this->suscriptorId = $suscriptorId;
        $this->suscriptor = Suscriptor::find($suscriptorId);
    }

    public function create()
    {
        $this->suscriptor = null;
        $this->suscriptorId = null;
    }


    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Estas seguro?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($suscriptorId)
    {
        $suscriptor = Suscriptor::find($suscriptorId);
        if ($suscriptor) {
            $suscriptor->delete();
        }
    }

    public function save()
    {

        if (!is_null($this->suscriptorId)) {
            $this->validate();
            $this->suscriptor->save();
        } else {
            $this->rules['suscriptor.email'][] = Rule::unique('suscriptores','email')->ignore($this->suscriptorId);
            $this->validate();
            if(!isset($this->suscriptor['active'])){
                $this->suscriptor['active'] = 0;
            }
            Suscriptor::create($this->suscriptor);
        }
        $this->create();
    }

    public function render()
    {
        $suscriptores = Suscriptor::select([
            'id',
            'email',
            'active',
        ])->with(['listas']);

        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
                if ($column == 'active') {
                    if($value === 'Activo' || $value === 'activo'){
                        $suscriptores->where($column,1);
                    }else if($value === 'Inactivo' || $value === 'inactivo'){
                        $suscriptores->where($column,0);
                    }
                } else {
                    $suscriptores->where($column, 'LIKE', '%' . $value . '%');
                }
            }
        }

        $suscriptores->orderBy($this->sortColumn, $this->sortDirection);

        return view('livewire.suscriptores.index', [
            'suscriptores' => $suscriptores->paginate(5)
        ])->layout('layouts.admin');
    }
}
