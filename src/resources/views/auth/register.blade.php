@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-links')
    <li class="header-nav__item">
        <a href="/login" class="header-nav__link">login</a>
    </li>
@endsection

@section('content')
    <div class="register-form__content">
        <div class="register-form__heading">
            <h2>Register</h2>
        </div>
        <form class="form" action="{{ route('register') }}" method="post">
            @csrf
            <div class="form__group">
                <label for="name">お名前</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="例：山田 太郎" />
                @error('name') <div class="form__error">{{ $message }}</div> @enderror
            </div>

            <div class="form__group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="例: text@example.com" />
                @error('email') <div class="form__error">{{ $message }}</div> @enderror
            </div>

            <div class="form__group">
                <label for="password">パスワード</label>
                <input type="password" name="password" placeholder="例: coachtech1234" />
                @error('password') <div class="form__error">{{ $message }}</div> @enderror
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection
