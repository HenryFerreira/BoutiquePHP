@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('mensaje')}}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <!-- <span aria-hidden="true">&times;</span> -->
        </button>
    </div>
    @endif

    <a href="{{ url('usuario/create') }}" class="btn btn-success">Registrar nuevo Usuario</a>
    <br>
    <br>
    <table class="table table-dark">
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
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$usuario->photo}}" alt="" width="150">
                </td>

                <td>{{ $usuario->name}}</td>
                <td>{{ $usuario->email}}</td>
                <td>{{ $usuario->mobile}}</td>
                <td>
                    <a href="{{ url('/usuario/'.$usuario->id.'/edit') }}" class="btn btn-info">
                        Editar
                    </a>
                    |
                    <form action="{{ url('/usuario/'.$usuario->id ) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE')}}
                        <input type="submit" class="btn btn-danger" onclick="return confirm('¿Realmente desea Borrar?')" value="Borrar">
                </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection