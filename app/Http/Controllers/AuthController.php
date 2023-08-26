<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
// use Illuminate\Contracts\Session\Session;
use Session;
use Auth;

class AuthController extends Controller
{
    //
    public function registerForm(){
        return view ('auth.register');
    }
    public function register(Request $request)
    {
        // dd($request->all());
       $validator =  $this->validate($request,[
            'name' => 'required',
            'email'=>'required |unique:users,email',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password'
       ]);

    //    dd($request->all());

       $data = User::create([
        'name' =>$request->name,
        'email' =>$request->email,
        'password' => Hash::make($request->password)
       ]);
    //    dd($data);

       auth()->login($data);

       return redirect('/');

    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());

        $validator = $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);

        $credential = $request->except('_token');
       if( Auth::attempt($credential) )  // checking email from database with user typing emai
       {
        return redirect(('/'));
       }
       else
       {
        return redirect('/login');
       }
    }
}
