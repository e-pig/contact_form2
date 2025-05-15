<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // テーブル名を指定（Laravelはデフォルトで複数形のテーブル名を使用します）
    protected $table = 'authors';

    // モデルで操作可能なカラムを指定（これを省略すると、すべてのカラムが操作可能）
    protected $fillable = ['name', 'email', 'password'];

    // パスワードを保存する際にハッシュ化
    protected $hidden = ['password'];
}
