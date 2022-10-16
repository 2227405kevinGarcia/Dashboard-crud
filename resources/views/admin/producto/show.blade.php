@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Producto: Información</h3>
    <div class="col-md-12">
        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Nombre</strong></label>
            </div>
            <div class="col-auto">
                {{$producto->nombre}}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Característica</strong></label>
            </div>
            <div class="col-auto">
                {{$producto->caracteristica}}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Género</strong></label>
            </div>
            <div class="col-auto">
                {{$producto->genero}}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Stock</strong></label>
            </div>
            <div class="col-auto">
                {{$producto->stock}}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Precio</strong></label>
            </div>
            <div class="col-auto">
                {{$producto->precio}}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Imagen</strong></label>
            </div>
            <div class="col-auto">
                <img src="/img-product/{{$producto->imagen}}" width="300">
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Categoría</strong></label>
            </div>
            <div class="col-auto">
                {{$producto->categoria}}
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('productos') }}"> Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection