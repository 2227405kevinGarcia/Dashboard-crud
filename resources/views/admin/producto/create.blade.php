@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Producto: Crear</h3>
    <div class="col-md-12">
        <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
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
                <label for="caracteristica">Característica <b class="text-danger">*</b></label>
                <input class="form-control @error('caracteristica') is-invalid @enderror" type="text" name="caracteristica" value="{{ old('caracteristica') }}">
                @error('caracteristica')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genero">Género <b class="text-danger">*</b></label>
                <select class="form-control @error('genero') is-invalid @enderror" name="genero">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
                @error('genero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock">Stock <b class="text-danger">*</b></label>
                <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" value="{{ old('stock') }}">
                @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio">Precio <b class="text-danger">*</b></label>
                <input class="form-control @error('precio') is-invalid @enderror" type="text" name="precio" value="{{ old('precio') }}">
                @error('precio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imagen">Imagen <b class="text-danger">*</b></label>
                <input class="form-control @error('imagen') is-invalid @enderror" type="file" name="imagen">
                @error('imagen')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categoria_id">Categoría <b class="text-danger">*</b></label>
                <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id">
                    @foreach ($categorias as $item)
                    <option value="{{$item->id}}"> {{$item}}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" name="action" value="Registrar">
                <a class="btn btn-danger" href="{{ route('productos') }}"> Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection