<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use MikeMcLin\WpPassword\Facades\WpPassword;

class LoginController extends Controller
{
    public function checkLogin(Request $request)
    {
        $un = $request->input('username');
        $pw = $request->input('password');

        $Users = User::where('user_email', $un)->first();
        if ($Users) {

            if (WpPassword::check($pw, $Users->user_pass)) {
                Session::put('user_id', $un);
                return redirect('/home');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
