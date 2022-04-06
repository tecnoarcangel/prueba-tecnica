<?php

use App\Http\Livewire\Administracion\Permisos;
use App\Http\Livewire\Administracion\Roles;
use App\Http\Livewire\Administracion\Usuarios as Usuarios;
use App\Http\Livewire\Administracion\Archivos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('upload', [\App\Http\Controllers\Administracion\UploadController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum', 'verified'],'prefix' => 'admin'], function () {
    Route::view('dashboard',   'admin.dashboard')->name('dashboard');
    Route::get('usuarios',     Usuarios::class)->name('usuarios.index')->middleware(['can:Ver Usuarios']);
    Route::get('roles',        Roles::class)->name('roles.index')->middleware(['can:Ver Roles']);
    Route::get('permisos',     Permisos::class)->name('permisos.index')->middleware(['can:Ver Permisos']);
    Route::get('archivos',     Archivos::class)->name('archivos.index')->middleware(['can:Ver Archivos']);
});