@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Productos</h3>
    <div class="text-right">
        <a class="btn btn-success" href="{{ route('producto.create') }}">Crear Nuevo</a>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Característica</th>
                <th>Género</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->caracteristica}}</td>
                <td>{{$item->genero}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->precio}}</td>
                <td>
                    <img src="/img-product/{{$item->imagen}}" width="100">
                </td>
                <td>{{$item->categoria}}</td>
                <td class="text-right">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('producto.show',$item->id)}}">Ver</a></li>
                            <li><a class="dropdown-item" href="{{route('producto.edit',$item->id)}}">Editar</a></li>
                            <li><button class="dropdown-item" data-toggle="modal" data-target="#modal-{{$item->id}}">Eliminar</button></li>
                        </ul>
                    </div>
                    @include('admin.producto.modal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection