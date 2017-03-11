<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller{

    //Para listar los usuarios
    public function index(Request $request){
        $users = User::all();
        return view('users.index', ['list' => $users]);
    }

    //Para crear un usuario (muestra el formulario para ingresar la información)
    public function create(Request $request){
        return view('users.create');
    }

    //Para almacenar los datos del nuevo usuario en la bd
    public function store(Request $request){
        $input = $request->all();
        $this->validate($request, [ //validación para los campos
            'name' => 'required | string | alpha_dash | max:66',
            'email' => 'required | email',
            'password' => 'required | string | min:8 | max:64',
        ]);
        User::create($input);
        Session::flash('flash_message','User successfully added!');
        return redirect('/home');
    }

    //Para mostrar la información de un usuario especifico
    public function show(Request $request, $id){
        try{
            $user = User::findOrFail($id);
            // return view('users.show')->withData($user);
            return view('users.show', ['data' => $user]);
        }
        catch(ModelNotFoundException $e){
            Session::flash('flash_message', "The User ($id) could not be found!");
            return redirect()->back();
        }
    }

    //Para editar un usuario (muestra el formulario con la información para editar)
    public function edit(Request $request, $id){
        try{
            $user = User::findOrFail($id);
            return view('users.edit', ['data' => $user]);
        }
        catch(ModelNotFoundException $e){
            Session::flash('flash_message', "The User ($id) could not be found to be edited!");
            return redirect()->back();
        }
    }

    //Para almacenar los datos de la edición del usuario en la bd
    public function update(Request $request, $id){
        try{
            $user = User::findOrFail($id);
            $this->validate($request, [
                 'name' => 'required | string | max:66',
                 'email' => 'required | email',
                 'password' => 'required | string | min:8 | max:64',
            ]);
            $input = $request->all();
            $user->fill($input)->save();
            Session::flash('flash_message', 'User successfully edited!');
            return redirect('/home');
        }
        catch(ModelNotFoundException $e){
            Session::flash('flash_message', "The User ($id) could not be found to be edited!");
            return redirect()->back();
        }
    }
}
