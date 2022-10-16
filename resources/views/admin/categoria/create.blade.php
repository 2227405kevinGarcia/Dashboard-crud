@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Categoria: Crear</h3>
    <div class="col-md-12">
        <form action="{{ route('categoria.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre">Nombre <b class="text-danger">*</b></label>
                <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" name="action" value="Registrar">
                <a class="btn btn-danger" href="{{ route('categorias') }}"> Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection