<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    //
    protected $table = 'user_address';
    //protected $fillable = ['tel']; //保存したいカラム名が1つの場合
    protected $guarded = ['_token'];
}
