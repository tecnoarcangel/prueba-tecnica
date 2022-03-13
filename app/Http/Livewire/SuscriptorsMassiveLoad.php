<?php

namespace App\Http\Livewire;

use App\Imports\SuscriptorImport;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class SuscriptorsMassiveLoad extends Component
{
    use WithFileUploads;
    public $archivo;

    public function render()
    {
        return view('livewire.suscriptors-massive-load');
    }
    public function import()
    {
        $this->validate([
            'archivo' => ['required','file']
        ]);

        $import = new SuscriptorImport();
        Log::channel('created-users')->notice('----------------------------------------------------------------------------------');
        Log::channel('created-users')->notice('Nueva carga masiva: '.date('Y-m-d H:i:s'));
        session('cajaverde.user.created.batch', false);
        $archivo = Excel::import($import, $this->archivo);
        $alert_success = 'Archivo cargado exitosamente.';
        $data = $import->return_data;
        // Excel::import(new SuscriptorImport, request()->file('archivo'),null,\Maatwebsite\Excel\Excel::XLSX);
    }
}
