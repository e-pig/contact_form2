<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // 使用するテーブル名を指定
    protected $table = 'contacts';

    // 複数代入可能なカラムを定義
    protected $fillable = [
        'name',
        'email',
        'gender',
        'contact_type',
        'contact_date'
    ];
}
