<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('/register/register', [
            "title" => "Register",
            "active" => "Register"
        ]);
    }

    public function store(){
        return request()->all();
    }
}
