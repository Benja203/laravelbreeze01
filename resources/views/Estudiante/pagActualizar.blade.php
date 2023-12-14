@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">PAGINA DE ACTUALIZAR</h1>
@endsection

@section('seccion')

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Estudiante.xUpdate', $xActAlumnos->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @if($errors ->has('codEst'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>Codigo</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif  

        @if($errors ->has('nomEst'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>Nombre</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors ->has('apeEst'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>Apellido</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors ->has('fnaEst'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>Fecha</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif        

        @if($errors ->has('turMat'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>Turno</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif  

        @if($errors ->has('semMat'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>Semestre</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif  

        @if($errors ->has('estMat'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>Estado</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif  

        <input type="text" name="codEst" placeholder="Código" value="{{ $xActAlumnos->codEst }}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombres" value="{{ $xActAlumnos->nomEst }}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{ $xActAlumnos->apeEst }}" class="form-control mb-2">
        <input type="date" name="fnaEst" placeholder="Fecha Nacimiento" value="{{ $xActAlumnos->fnaEst }}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActAlumnos->turMat == 1) {{ "SELECTED" }} @endif>Turno dia(1)</option>
            <option value="2" @if ($xActAlumnos->turMat == 2) {{ "SELECTED" }} @endif>Turno noche(2)</option>
            <option value="3" @if ($xActAlumnos->turMat == 3) {{ "SELECTED" }} @endif>Turno tarde(3)</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=0; $i < 7; $i++)
                <option value="{{$i}}" @if ($xActAlumnos->semMat == $i) {{ "SELECTED" }} @endif>Semestre {{$i}}></option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActAlumnos->estMat == 1) {{ "SELECTED" }} @endif>Activo</option>
            <option value="0" @if ($xActAlumnos->estMat == 0) {{ "SELECTED" }} @endif>Inactivo</option>
        </select>
        <button class="btn btn-warning" type="submit">Actualizar</button>
    </form>
        

    </form>
    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimientos</div>
    <table class="table">
    </table>

@endsection