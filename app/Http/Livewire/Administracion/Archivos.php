<?php

namespace App\Http\Livewire\Administracion;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Archivo;
use App\Models\TemporaryFile;

class Archivos extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $sortField;
    public $sortDirection;

    public $nombre, $descripcion, $archivo, $usuario;

    public bool $updateArchivo = false;
    public bool $createArchivo = false;
    public bool $showArchivo = false;
    public bool $deleteArchivo = false;

    protected $queryString = ['sortField', 'sortDirection'];

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
        $this->usuario = auth()->user();

        if($this->usuario->hasRole('Admin') || $this->usuario->hasRole('Super Admin')){
            $archivos = Archivo::select();
        }else{
            $archivos = $this->usuario->archivos();
        }

        return view('livewire.archivos.index',[
                'archivos' => $archivos->search('nombre',$this->search)->sortBy($this->sortField, $this->sortDirection)->paginate(10),
            ])->layout('layouts.admin');
    }

    public function create()
    {
        $validated = $this->validate([
            'nombre'      => ['required','string','min:4'],
            'descripcion' => ['required'],
        ],[
            'nombre.required'        => 'Este campo es obligatorio',
            'descripcion.required'   => 'Este campo es obligatorio',
        ]);

        $file = TemporaryFile::all()->last();

        $archivo = Archivo::create([
            'nombre'      => $this->nombre,
            'descripcion' => $this->descripcion,
            'usuario_id'  => $this->usuario->id,
            'archivo'     => $file->filename,
        ]);

        $this->createArchivo = false;
        $this->resetInput();
        $this->resetPage();
    }

    public function getArchivo(Archivo $archivo, $tipo)
    {
        $this->selected_id  = $archivo->id;
        $this->nombre       = $archivo->nombre;
        $this->descripcion  = $archivo->descripcion;
        $this->archivo      = $archivo->archivo;

        if($tipo === 'update'){
            $this->updateArchivo = true;
        }else if($tipo === 'show'){
            $this->showArchivo = true;
        }
        else{
            $this->deleteArchivo = true;
        }
    }

    public function update()
    {
        $validated = $this->validate([
            'nombre'      => ['required','string','min:4'],
            'descripcion' => ['required'],
        ],[
            'nombre.required'        => 'Este campo es obligatorio',
            'descripcion.required'   => 'Este campo es obligatorio',
        ]);

        $archivo = Archivo::findOrFail($this->selected_id);

        $filename = sha1(time().time()).'.'.$this->archivo->getClientOriginalExtension();
        $filepath = $this->archivo->storeAs('uploads',$filename,'public');

        $data = [
            'nombre'      => $this->nombre,
            'descripcion' => $this->descripcion,
            'archivo'     => 'storage/'.$filepath
        ];


        $archivo->update($data);

        $this->resetInput();
        session()->flash('message', 'Archivo actualizado exitosamente');
        $this->updateArchivo = false;
        $this->resetPage();
    }


    public function delete()
    {
        $archivo = Archivo::findOrFail($this->selected_id);

        $archivo->delete();

        session()->flash('message', 'Archivo eliminado exitosamente');

        $this->deleteArchivo = false;
        $this->resetInput();
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->nombre      = null;
        $this->descripcion = null;
        $this->archivo     = null;
    }
}
