@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/usuario/'.$usuario->id )}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH')}}
@include('usuario.form',['modo'=>'Editar'])
</form>

</div>
@endsection
