<?php

namespace App\Http\Livewire\Administracion;

use App\Models\Pagina;
use Livewire\Component;
use Livewire\WithPagination;

class Paginas extends Component
{
    use WithPagination;
    public $search = '';
    public $sortField;
    public $sortDirection;

    protected $queryString = ['sortField', 'sortDirection'];

    public bool $deletePagina = false;
    public $selected_id, $name;

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
        return view('livewire.paginas.index',[
            'paginas' => Pagina::search('name',$this->search)->sortBy($this->sortField, $this->sortDirection)->paginate(10),
        ])
        ->layout('layouts.admin');
    }

    public function create()
    {
        return redirect()->route('paginas.create');
    }


    public function edit($pageId)
    {
        return redirect()->route('paginas.edit',$pageId);
    }

    public function getPage($pageId)
    {
        $this->selected_id = $pageId;
        $pagina = Pagina::findOrFail($pageId);
        $this->name = $pagina->name;
        $this->deletePagina = true;
    }
    public function delete()
    {
        $pagina = Pagina::findOrFail($this->selected_id);
        $pagina->delete();
        session()->flash('message', 'Página eliminado exitosamente');
        $this->deletePagina = false;
        $this->resetInput();
        $this->resetPage();
    }
}
