<h1>{{$modo}} Usuario</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <label for="Nombre">Nombre: </label>
    <input type="text" class="form-control" name="name" value="{{ isset($usuario->name)?$usuario->name:old('name') }}" id="name">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Email: </label>
    <input type="email" class="form-control" name="email" value="{{ isset($usuario->email)?$usuario->email:old('email') }}" id="email">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Password: </label>
    <input type="password" class="form-control" name="password" value="{{ isset($usuario->password)?$usuario->password:old('password') }}" id="password">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Teléfono: </label>
    <input type="text" class="form-control" name="mobile" value="{{ isset($usuario->mobile)?$usuario->mobile:old('mobile') }}" id="mobile">
    <br>
</div>

<div class="form-group">
    <input type="checkbox" class="form-control" checked=true value=0 hidden=true name="isAdmin" id="isAdmin">
</div>
<div class="form-group">
    <!-- <label for="Foto">Foto: </label> -->
    @if(isset($usuario->photo))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$usuario->photo}}" alt="" width="150">
    @endif
    <br>
    <br>
    <input type="file" class="form-control" name="photo" value="" id="photo">
    <br>
</div>
<input type="submit" class="btn btn-success" value="{{$modo}} datos">
<a href="{{ url('usuario/') }}" class="btn btn-primary">Volver</a>