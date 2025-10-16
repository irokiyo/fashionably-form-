@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection

@section('link')
<form class="form" action="{{ route('logout') }}" method="post">
@csrf
<button class="header__btn">logout</button>
</form>
@endsection
