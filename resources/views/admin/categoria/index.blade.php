@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Categorías</h3>
    <div class="text-right">
        <a class="btn btn-success" href="{{ route('categoria.create') }}">Crear Nuevo</a>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td class="text-right">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('categoria.show',$item->id)}}">Ver</a></li>
                            <li><a class="dropdown-item" href="{{route('categoria.edit',$item->id)}}">Editar</a></li>
                            <li><button class="dropdown-item" data-toggle="modal" data-target="#modal-{{$item->id}}">Eliminar</button></li>
                        </ul>
                    </div>
                    @include('admin.categoria.modal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection