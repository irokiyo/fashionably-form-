<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //ログイン画面表示
    public function login(){

        return view('login');
    }
}
