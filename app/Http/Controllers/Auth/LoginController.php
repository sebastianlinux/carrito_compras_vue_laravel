<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
   

    public function index()
    {

        $credentials = $this->validate(request(),[
            'email' =>'email|string|required',
            'password'=>'required'
        ]);
        //var_dump($credentials);
        if(Auth::attempt($credentials))
        {
            return redirect()->route('mainViewApp');
        }else{
            return back()->withErrors(['email'=>'Tu información no concuerda con ningun registro']);
        }
        
        

    }//end index()


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
