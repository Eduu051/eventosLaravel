<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Esdeveniment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EsdevenimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        if(isset($_REQUEST['mensaje'])){
            $mensaje = $_REQUEST['mensaje'];
            return view('esdeveniments.index', ['categorias'=>$categorias, 'mensaje'=>$mensaje]);
        } else {
            return view('esdeveniments.index', ['categorias'=>$categorias]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = Esdeveniment::findOrFail($id);
        return view('esdeveniments.show', ['evento'=>$evento]);
    }

    public function reservar($id){
        $evento = Esdeveniment::findOrFail($id);
        $user = Auth::user();
        $edad = date_diff(date_create($user->fecha_nacimiento), date_create('today'))->y;

        if(!$user->esdeveniments->contains($evento->id) && $edad > $evento->edad_minima){
            $user->esdeveniments()->attach($evento->id);
            $mensaje = 'reservado';
        } elseif($user->esdeveniments->contains($evento->id)) {
            $mensaje = 'yaReservado';
        } else {
            $mensaje = 'noPuede';
        }

        return redirect()->route('esdeveniments.index', ['mensaje'=>$mensaje]);
    }

    public function cancelarReserva($id){
        $evento = Esdeveniment::findOrFail($id);
        $user = Auth::user();

        if($user->esdeveniments->contains($evento->id)){
            $user->esdeveniments()->detach($evento->id);
            $mensaje = 'cancelado';
            return redirect()->route('esdeveniments.index', ['mensaje'=>$mensaje]);
        }
    }
}
