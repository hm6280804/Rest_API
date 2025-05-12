<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(signupFormRequest $request){
        // dd($request->all());
        $info = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );

        $user = User::create($info);
        // dd($user);
        return redirect('login');
    }

    public function login(){
        return view('login');
    }

    public function Authenticate(Request $request){
         
        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = array(
            'email' => $email,
            'password' => $password
        );
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('posts'));
        } else{
            return redirect()->back()->with('error', 'Invalid Username or password')->withInput();
        }
    }


    public function posts(){
        return view('posts');
    }
}
