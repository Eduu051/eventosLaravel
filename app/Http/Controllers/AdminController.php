<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Esdeveniment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.index', ['categorias'=>$categorias]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.crear', ['categorias'=>$categorias]);
    }

    public function createCategoria(){
        return view('admin.createCategoria');
    }

    public function storeCategoria(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();
        $mensaje = "categoriaNew";
        return redirect()->route('admin.index', ['mensaje'=>$mensaje]);
    }

    public function destroyCategoria($id){
        $categoria = Categoria::findOrFail($id)->delete();
        $mensaje = "categoriaEliminada";
        return redirect()->route('admin.index', ['mensaje'=>$mensaje]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'fecha_evento' => 'required|date',
            'hora' => 'required',
            'max_personas' => 'required|integer|min:1',
            'edad_minima' => 'required|integer|min:0',
            'imagen' => 'required|string',
            'category_id' => 'required',
        ]);

        $evento = new Esdeveniment();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->hora = $request->hora;
        $evento->max_personas = $request->max_personas;
        $evento->edad_minima = $request->edad_minima;
        $evento->imagen = $request->imagen;
        $evento->category_id = $request->category_id;
        $evento->save();
        $mensaje = "creado";
        return redirect()->route('admin.index', ['mensaje'=>$mensaje]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = Esdeveniment::findOrFail($id);
        return view('admin.show', ['evento'=>$evento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evento = Esdeveniment::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.edit', ['evento'=>$evento, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'fecha_evento' => 'required|date',
            'hora' => 'required',
            'max_personas' => 'required|integer|min:1',
            'edad_minima' => 'required|integer|min:0',
            'imagen' => 'required|string',
            'category_id' => 'required',
        ]);

        $evento = Esdeveniment::findOrFail($id);
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->hora = $request->hora;
        $evento->max_personas = $request->max_personas;
        $evento->edad_minima = $request->edad_minima;
        $evento->imagen = $request->imagen;
        $evento->category_id = $request->category_id;
        $evento->save();
        $mensaje = "edit";
        return redirect()->route('admin.index', ['mensaje'=>$mensaje]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = Esdeveniment::findOrFail($id)->delete();
        $mensaje = "eliminado";
        return redirect()->route('admin.index', ['mensaje'=>$mensaje]);
    }
}
