<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Pagina;
use Illuminate\Http\Request;
use App\Http\Requests\PaginaRequest;

class PaginasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['can:Ver Paginas'])->only('index','show');
        $this->middleware(['can:Crear Paginas'])->only('create','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.paginas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paginas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaginaRequest $request)
    {
        $pagina = Pagina::create($request->except('_method','_token','meta_image'));

        if(isset($request->meta_image)){
            $extension = $request->meta_image->extension();
            $filename = sha1(time().time()).".$extension";
            $request->meta_image->move(public_path('storage/uploads/images'),$filename);
            $pagina->update(['meta_image' => $filename]);
        }
        session()->flash('message', 'Página creada exitosamente');
        return redirect()->route('paginas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pagina)
    {
        $pagina = Pagina::findOrFail($pagina);
        return view('admin.paginas.show')->with(compact('pagina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pagina)
    {
        $pagina = Pagina::findOrFail($pagina);
        return view('admin.paginas.edit')->with(compact('pagina'))  ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaginaRequest $request, $pagina)
    {
        $pagina = Pagina::findOrFail($pagina)->first();
        $pagina->update($request->except('_method','_toke','id','meta_image'));

        if(isset($request->meta_image)){
            $extension = $request->meta_image->extension();
            $filename = sha1(time().time()).".$extension";
            $request->meta_image->move(public_path('storage/uploads/images'),$filename);
            $pagina->update(['meta_image' => $filename]);
        }
        return redirect()->route('paginas.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {
        //
    }
}
