<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Author;
use App\Models\Contact;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    public function store(AuthorRequest $request)
    {
        $form = $request->validated();
        Author::create([
            'name' => $form['name'],
            'email' => $form['email'],
            'password' => bcrypt($form['password']),
        ]);

        return redirect()->route('login')->with('status', '登録が完了しました。');
    }

    public function create()
    {
        return view('auth.register');
    }


    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // ユーザー認証
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // 成功したらadmin画面へリダイレクト
            return redirect()->route('admin');
        }

        // 認証失敗時
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています。',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function admin()
    {
        $contacts = Contact::Paginate(5);
        return view('admin',compact('contacts'));
    }
}
