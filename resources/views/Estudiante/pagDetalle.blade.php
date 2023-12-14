@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"><b><i>Página de Lista</b></i></h1>
@endsection

@section('seccion')
   <h3> Detalle estudiante </h3>

   <p> <b>Id:</b>                  {{ $xDetAlumnos->id }} </p>
   <p> <b>Código:</b>              {{ $xDetAlumnos->codEst }} </p>
   <p> <b>Apellidos y nombres:</b> {{ $xDetAlumnos->apeEst }}, {{ $xDetAlumnos->nomEst }} </p>
   <p> <b>Fecha de nacimiento:</b> {{ $xDetAlumnos->fnaEst }} </p>
   <p> <b>Turno:</b>               {{ $xDetAlumnos->turEst }} </p>
   <p> <b>Semestre:</b>            {{ $xDetAlumnos->semEst }} </p>
   <p> <b>Estado de matricula:</b> {{ $xDetAlumnos->estEst }} </p>
    
@endsection
   

