@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Producto: Editar</h3>
    <div class="col-md-12">
        <form action="{{ route('producto.update', $producto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre">Nombre <b class="text-danger">*</b></label>
                <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="caracteristica">Característica <b class="text-danger">*</b></label>
                <input class="form-control @error('caracteristica') is-invalid @enderror" type="text" name="caracteristica" value="{{ old('caracteristica', $producto->caracteristica) }}">
                @error('caracteristica')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genero">Género <b class="text-danger">*</b></label>
                <select class="form-control @error('genero') is-invalid @enderror" name="genero">
                    @if($producto->genero == 'Hombre')
                    <option value="Hombre" selected>Hombre</option>
                    <option value="Mujer">Mujer</option>
                    @else
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer" selected>Mujer</option>
                    @endif

                </select>
                @error('genero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock">Stock <b class="text-danger">*</b></label>
                <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" value="{{ old('stock', $producto->stock) }}">
                @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio">Precio <b class="text-danger">*</b></label>
                <input class="form-control @error('precio') is-invalid @enderror" type="text" name="precio" value="{{ old('precio', $producto->precio) }}">
                @error('precio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imagen">Imagen </label>
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
                    @if($item->id == $producto->categoria_id)
                    <option value="{{$item->id}}" selected> {{$item}}</option>
                    @else
                    <option value="{{$item->id}}"> {{$item}}</option>
                    @endif
                    @endforeach
                </select>
                @error('categoria_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" name="action" value="Actualizar">
                <a class="btn btn-danger" href="{{ route('productos') }}"> Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection