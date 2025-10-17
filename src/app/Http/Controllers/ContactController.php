<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //管理画面表示
    public function admin(){

        return view('admin');
    }
}
