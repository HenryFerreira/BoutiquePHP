@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<a href="{{ url('usuario/create') }}">Registrar nuevo Usuario</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id}}</td>

            <td>
                <img src="{{asset('storage').'/'.$usuario->photo}}" alt="" width="100">
            </td>

            <td>{{ $usuario->name}}</td>
            <td>{{ $usuario->email}}</td>
            <td>{{ $usuario->mobile}}</td>
            <td>
                <a href="{{ url('/usuario/'.$usuario->id.'/edit') }}">
                    Editar
                </a>
                |
                <form action="{{ url('/usuario/'.$usuario->id ) }}" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Realmente desea Borrar?')" value="Borrar">
            </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection