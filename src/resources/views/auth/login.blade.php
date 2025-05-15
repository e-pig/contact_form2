@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-links')
    <li class="header-nav__item">
        <a href="{{ route('register') }}" class="header-nav__link">register</a>
    </li>
@endsection

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@section('content')
    <div class="login-form__content">
        <div class="login-form__heading">
            <h2>ログイン</h2>
        </div>
        <form class="form" action="/login" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例: text@example.com" />
                    @error('email')
                        <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <input type="password" name="password" placeholder="例: coachtech1234" />
                    @error('password')
                        <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection
