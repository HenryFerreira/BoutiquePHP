<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=Usuario::paginate(5);
        return view('usuario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
          'name'=>'required|string|max:30',
          'email'=>'required|email',
          'password'=>'required|string|min:8',
          'mobile'=>'required|string|max:9',
          'photo'=>'required|max:10000|mimes:jpeg,png,jpg,jfif',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'photo.required'=>'La Foto es Requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosUsuario = request()->except('_token');
        if($request->hasFile('photo')){
            $datosUsuario['photo']=$request->file('photo')->store('uploads','public');

        }
        Usuario::insert($datosUsuario);
        //return response()->json($datosUsuario);
        return redirect('usuario')->with('mensaje','Usuario agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'name'=>'required|string|max:30',
            'email'=>'required|email',
            'password'=>'required|string|min:8',
            'mobile'=>'required|string|max:9',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('photo')){
            $campos=['photo'=>'required|max:10000|mimes:jpeg,png,jpg,jfif'];
            $mensaje=['photo.required'=>'La Foto es Requerida'];
        }

        $this->validate($request, $campos, $mensaje);

        $datosUsuario = request()->except(['_token','_method']);
        if($request->hasFile('photo')){
            $usuario=Usuario::findOrFail($id);
            Storage::delete('public/'.$usuario->photo);
            $datosUsuario['photo']=$request->file('photo')->store('uploads','public');

        }
        Usuario::where('id','=',$id)->update($datosUsuario);
        $usuario=Usuario::findOrFail($id);
        //return redirect('usuario');
        return redirect('usuario')->with('mensaje','Usuario Modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
        $usuario=Usuario::findOrFail($id);

        if(Storage::delete('public/'.$usuario->photo)){
            Usuario::destroy($id);
        }
        
        return redirect('usuario')->with('mensaje','Usuario eliminado con éxito');
    }
}
