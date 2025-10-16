@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection

@section('link')
<a href="{{ route('login') }}" class="header__btn">login</a>
@endsection


@section('content')
<div class="ttl">Register</div>
<div class="card">
    <form action="{{ route('register') }}" method="post" class="form">
        @csrf
        <div class="form-item">
            <div class="form-item-ttl">お名前</div>
            <input type="name" class="form__text" name="name" value="{{ old('name') }}" placeholder="例: 山田　太郎">
        </div>
        <div class="form-item">
            <div class="form-item-ttl">メールアドレス</div>
            <input type="email" class="form__text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
        </div>
        <div class="form-item">
            <div class="form-item-ttl">パスワード</div>
            <input type="password" class="form__text" name="password" value="{{ old('password') }}" placeholder="例: coachtech1106">
        </div>
        <div class="form__btn">
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
    @if ($errors->any())
    <div class="form-errors" style="color:red; margin-top: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
@endsection

