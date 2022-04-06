<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\Archivo;

class UploadController extends Controller
{
    public function store(Request $request)
    {

    if($request->hasFile('archivo')){

            $file = $request->file('archivo');
            $filename = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;
            $filepath = $file->storeAs('archivos/tmp/'. $folder, $filename, 'public');

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filepath
            ]);
    
            return $folder;
    }

    return '';

    }

}
