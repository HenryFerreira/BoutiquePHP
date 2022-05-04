<h1>{{$modo}} Usuario</h1>
<label for="Nombre">Nombre: </label>
<input type="text" name="name" value="{{ isset($usuario->name)?$usuario->name:'' }}" id="name">
<br>
<label for="Nombre">Email: </label>
<input type="email" name="email" value="{{ isset($usuario->email)?$usuario->email:'' }}" id="email">
<br>
<label for="Nombre">Password: </label>
<input type="password" name="password" value="{{ isset($usuario->password)?$usuario->password:'' }}" id="password">
<br>
<label for="Nombre">Teléfono: </label>
<input type="text" name="mobile" value="{{ isset($usuario->mobile)?$usuario->mobile:'' }}" id="mobile">
<br>
<input type="checkbox" checked=true value=0 hidden=true name="isAdmin" id="isAdmin">
<label for="Foto">Foto: </label>
@if(isset($usuario->photo))
<img src="{{asset('storage').'/'.$usuario->photo}}" alt="" width="100">
@endif
<input type="file" name="photo" value="" id="photo">
<br>
<input type="submit" value="{{$modo}} datos">
<a href="{{ url('usuario/') }}">Volver</a>

