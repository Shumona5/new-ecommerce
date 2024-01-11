<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
        
     public function login()
    {
         return view('backend.pages.login');
    }

    public function doLogin(Request $request){
       
        $loginInfo=$request->except('_token');

        if(Auth::attempt($loginInfo)){
            notify()->success('Login Successfully');
            return redirect()->route('dashboard');
        }
       notify()->error('Invalid user or email');
       return redirect()->back();

    }


    public function list(){

        $users=User::all();
        return view('backend.pages.users.list',compact('users'));
    }

    public function create()
    {
        return view('backend.pages.users.create');
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',

        ]);

        if ($validate->fails()) {

            return redirect()->back()->withErrors($validate)->withInput();
        }

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,

        ]);
        notify()->success('User Created Successfully');
        return redirect()->route('user.list');
    }
}
