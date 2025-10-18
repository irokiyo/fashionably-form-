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

@section('content')
<div class="admin">
    <div class="admin__ttl">
        <h2 class="admin__ttl-name">Admin</h2>
    </div>
    <div class="search">
        <form action="get" class="search__form">
            <div class="search__input">
                <input type="email" class="search__input-email" name="email" placeholder="例: 名前やメールアドレスを入力してください">
                <select name="gender" id="gender" class="search__input-gender">
                    <option value="">性別</option>
                    <option value="1" name="gender">男性</option>
                    <option value="2" name="gender">女性</option>
                    <option value="3" name="gender">その他</option>
                </select>
                <select name="category" id="category" class="search__input-category">
                    <option value="">お問い合わせの種類</option>
                    <option value="1" name="gender">男性</option>
                    <option value="2" name="gender">女性</option>
                    <option value="3" name="gender">その他</option>
                </select>
                <input type="date" class="search__input-date" name="date" >
            </div>
            <div class="search__btn">
                <button type="submit" class="search__btn-search">検索</button>
                <a href="{{ route('admin') }}" class="search__btn-reset">リセット</a>
            </div>
            <div class="frame">
                <a href="" class="frame-export">エクスポート</a>
            </div>
            <div class="pagination">{{ $contacts->links('vendor.pagination.bootstrap-4') }}</div>

            <table class="admin-table">
                <tr class="table__row-label">
                    <td class="table__label">お名前 </td>
                    <td class="table__label">性別</td>
                    <td class="table__label">メールアドレス</td>
                    <td class="table__label">お問い合わせの種類</td>
                    <td class="table__label"></td>
                </tr>
                @foreach ($contacts as $contact)
                <tr class="table__row-data">
                    <td class="table__data">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td class="table__data">
                    @if($contact->gender==1)
                    男性
                    @elseif($contact->gender==2)
                    女性
                    @else
                    その他
                    @endif
                    </td>
                    <td class="table__data">{{ $contact->email }}</td>
                    <td class="table__data">{{ $contact->category->content }}</td>
                    <td class="table__data"><a href="#modal-edit-{{ $contact->id }}" class="admin__btn-show">詳細</a></td>
                </tr>
                    {{-- モーダル--}}
                    <div id="modal-edit-{{ $contact->id }}" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title-{{ $contact->id }}">

                        <div class="panel">
                            <div class="content">
                                <form action="" class="modal__form" method="post" >
                                @csrf
                                @method('DELETE')
                                    <div class="detail__group">
                                        <label class="label">お名前</label>
                                        <p class="detail">{{ $contact->last_name }} {{ $contact->first_name }}</p>
                                    </div>
                                    <div class="detail__group">
                                        <label class="label">性別</label>
                                        <p class="detail">
                                        @if($contact->gender==1)
                                        男性
                                        @elseif($contact->gender==2)
                                        女性
                                        @else
                                        その他
                                        @endif
                                        </p>
                                    </div>
                                    <div class="detail__group">
                                        <label class="label">メールアドレス</label>
                                        <p class="detail">{{ $contact->email }}</p>
                                    </div>
                                    <div class="detail__group">
                                        <label class="label">電話番号</label>
                                        <p class="detail">{{ $contact->tel1 }}{{ $contact->tel2 }}{{ $contact->tel3 }}</p>
                                    </div>
                                    <div class="detail__group">
                                        <label class="label">住所</label>
                                        <p class="detail">{{ $contact->address }}</p>
                                    </div>
                                    <div class="detail__group">
                                        <label class="label">建物名</label>
                                        <p class="detail">{{ $contact->building }}</p>
                                    </div>
                                    <div class="detail__group">
                                        <label class="label">お問い合わせの種類</label>
                                        <p class="detail">{{ $contact->category->content }}</p>
                                    </div>
                                    <div class="detail__group">
                                        <label class="label">お問い合わせ内容</label>
                                        <p class="detail">{{ $contact->detail }}</p>
                                    </div>
                                    <div class="form__btn">
                                        <button type="submit" class="btn__delete">削除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </table>
        </form>
        @endforeach
    </div>
</div>
@endsection

