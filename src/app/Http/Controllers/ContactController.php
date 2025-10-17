<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //管理画面表示
    public function admin(){
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin',compact('contacts', 'categories'));
    }
}
