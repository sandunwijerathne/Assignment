<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        if (Session::has('user_id')) {
            $bookposts  = $this->getPost();
            return view('home', compact(['bookposts']));
        } else {
            return redirect('/');
        }
        
    }
}
