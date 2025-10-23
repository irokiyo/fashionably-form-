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
    public function search(Request $request){
        if ($request->has('reset')) {
            return redirect()->route('admin');}

        $contacts = contact::with('category')->contactSearch($request->contact_id)->keywordSearch($request->keyword)->genderSearch($request->gender)->CategorySearch($request->category_id)->CreatedOn($request->date)->paginate(7)->withQueryString();;
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
    //削除
    public function delete(Request $request){
        $contact = Contact::findOrFail($request->id);
        $contact->delete();

        return redirect()->route('admin');
    }
    //問い合わせフォーム
    public function index(Request $request){
        $categories=Category::all();

        return view('index',compact('categories'));
    }
    //確認画面
    public function confirm(Request $request){
        $contacts=$request->all();
        $category = Category::find($request->category_id);
        
        return view('confirm',compact('contacts','category'));

    }
    //データ登録
    public function store(Request $request){
        $contacts=$request->all();

        Contact::create($contacts);

        return redirect()->route('thanks');
    }
    //登録完了画面
    public function thanks(){
        return view('thanks');

    }

}
