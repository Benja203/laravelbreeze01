<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class PagesController extends Controller
{
    public function fnIndex () {
        return view('welcome');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);     //Datos de BD por id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){
        
        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();

        //$xAlumnos = Estudiante::all();                    Datos BD
        //return view('pagLista', compact('xAlumnos));        Equivalente

        return back()->with('msj','Se actualizó con éxito...');
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj', 'Se elimino con éxito...');
    }
    
    
    public function fnLista () {
        $xAlumnos = Estudiante::all();   //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }

    
    public function fnGaleria ($numero=null) {
        $valor = $numero;
        $otro = 25;

        //return view('pagGaleria', ['valor'=>$, 'otro' =>25]);
        return view('pagGaleria', compact('valor', 'otro'));
    }

    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);

        $nuevoEstudiante = new Estudiante;
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

}
