<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index(){
        return view('login.index',[
            'title'=>'Login',
            'active'=>'login'
        ]);
    }

    public function authenticate(Request $request){
       
        $credentials = $request->validate([
    //    $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        // jika percobaan login yang dilakukan credential itu berhasil 
        if (Auth::attempt($credentials)) {
        
            $request->session()->regenerate();
            // regenerate merupakan untuk mengindari kejahatan hacking yaitu session fixation


            // redirect ke routes baru 
            // intended supaya melewati middleware
            return redirect()->intended('/dashboard');

        }


// balik ke haaman login dan kirim pesan error
        return back()->with('loginError', 'Login failed!!');

        

    }


    public function logout(){
        Auth::logout();

        // invalidate session nya biar gak di pake 
        request()->session()->invalidate();

        // bikin baru token nya supaya gak dibajak
        request()->session()->regenerateToken();
    
        return redirect('/');

    }
}
