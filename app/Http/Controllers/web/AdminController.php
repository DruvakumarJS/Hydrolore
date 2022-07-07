<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\auth;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;


class AdminController extends Controller
{
    public function login()
    {
       
        return view('login');
    }

    public function register()
    {
        auth()->user()->tokens()->delete();
        return view('registerform');
    }
     
    public function login_validation(Request $request)
    {
        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(auth()->attempt($login_credentials)){
           
            $user_login_token= auth()->user()->createToken('passport_token')->accessToken;
             return redirect()->route('dashboard');

        }
        else{
           
           // return view('login');
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    { 
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4',
        ]);
        $user= User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        
        return view('login');
       
   
}

public function logout()
    {
        auth()->user()->tokens()->delete();
        session()->flush();

        return redirect()->route('login');
    }

 public function authenticatedUserDetails(){
        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }

}
