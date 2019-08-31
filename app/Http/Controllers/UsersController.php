<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= user::orderBy('id', 'ASC')->paginate(4);

        return view('admin.usuarios.index')->with ('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {

        $usuario=new User($request->all());
        $usuario->password=bcrypt($request->password);
        $usuario->save();

        flash("Se ha registrado ". $usuario->name . " de forma exitosa")->success()->important();
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        return view('admin.usuarios.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password))
        {
            $user->password=bcrypt($request->password);
        }
        $user->type = $request->type;

        $user->save();

        flash('El usuario '. $user->name . ' ha sido editado con exito!')->warning()->important();
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario= User::find($id);
        $usuario->delete();

        flash('El usuario ' . $usuario->name . 'a sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.usuarios.index');
    }
}
