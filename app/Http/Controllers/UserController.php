<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller
{
    public function index(Request $request)//Para listar los usuarios
    {
        $users = User::all();
        return view('users.index', ['list' => $users]);
    }

    public function show(Request $request, $id)
    {
        try
        {
            $user = User::findOrFail($id);
            // return view('users.show')->withData($user);
            return view('users.show', ['data' => $user]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "The User ($id) could not be found!");
            return redirect()->back();
        }
    }


    public function create(Request $request)
    {
        return view('users.create');
    }

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

}
