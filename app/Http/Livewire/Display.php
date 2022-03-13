<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pagina;

class Display extends Component
{
    public $pagina;

    public function mount(Pagina $pagina)
    {
        $this->pagina = $pagina;
    }

    public function render()
    {
        return view('livewire.display',[
            'pagina' => $this->pagina
        ])->layout('layouts.guest');
    }
}
