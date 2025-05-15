<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * ログインフォームを表示
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * ログイン処理を行い、成功したら指定されたページにリダイレクト
     */
    public function store(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin'); // ログイン後、adminページへリダイレクト
        }

        return back()->withErrors([
            'email' => '認証に失敗しました。',
        ]);
    }

    /**
     * ログアウト処理
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * ログインのバリデーション
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    }
}
