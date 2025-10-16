@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection

@section('link')
    <a href="" class="header__btn">register</a>
@endsection


@section('content')
    <div class="ttl">Login</div>
    <div class="card">
        <form action="" method="post" class="form">
            <div class="form-item">
                <div class="form-item-ttl">メールアドレス</div>
                <input type="email" class="form__text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            </div>
            <div class="form-item">
                <div class="form-item-ttl">パスワード</div>
                <input type="password" class="form__text" name="password" value="{{ old('password') }}" placeholder="例: coachtech1106">
            </div>
            <div class="form__btn">
                <button type="submit" class="btn-submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection
