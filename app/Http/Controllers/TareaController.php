<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;

class TareaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retornamos las tareas asociadas al usuario activo
        return Tarea::where('user_id',auth()->id())->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Código para guardar la tarea
        $tarea = new Tarea();
        $tarea->description = $request->description;
        //des esta manera nos traemos el id del ususario activo
        $auth = app()->make('auth');
        $tarea->user_id =  $auth->id();
        $tarea->save();
        return $tarea;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Código para actualizar registro 
        $tarea = Tarea::find($id);
        $tarea->description = $request->description;
        $tarea->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Código para eliminar la tarea
        $tarea = Tarea::find($id);
        $tarea->delete();
    }
}
