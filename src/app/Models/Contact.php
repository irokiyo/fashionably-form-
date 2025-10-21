<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel1',
        'tel2',
        'tel3',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    //スコープの定義
    public function scopeContactSearch($query, $contact_id){
        if (!empty($contact_id)) {
        $query->where('contact_id', $contact_id);
        }
    }
    //キーワード検索
    public function scopeKeywordSearch($query ,$keyword){
        if (!empty($keyword)) {
        $query->where('last_name', 'like', "%{$keyword}%")
            ->orWhere('first_name', 'like', "%{$keyword}%")
            ->orWhere('email', 'like', "%{$keyword}%");
        };
        return $query;
    }
    //性別
    public function scopeGenderSearch($query,$gender){
        if (!empty($gender)) {
        $query->where('gender', $gender);
        }
        return $query;
    }
    //カテゴリ検索
    public function scopeCategorySearch($query,$category_id){
        if (!empty($category_id)){
        $query->where('category_id', $category_id);
        };
        return $query;
    }
}
