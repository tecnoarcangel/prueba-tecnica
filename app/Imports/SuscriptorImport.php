<?php

namespace App\Imports;

use App\Http\Livewire\Administracion\Suscriptores;
use App\Models\Suscriptor;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\ToModel;

class SuscriptorImport implements ToCollection, SkipsOnError
{
    use SkipsErrors;

    /**
     * @param array $row
     *
     * @return User|null
     */
    public function collection(Collection $row)
    {
        $suscriptor = Suscriptor::updateOrCreate([
            'email' => $row[0],
            'active' => 1,
        ]);
    }
}
