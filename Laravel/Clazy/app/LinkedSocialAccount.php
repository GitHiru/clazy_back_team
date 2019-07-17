<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSocialAccount extends Model
{
    //
}

// 逆のリレーションをLinkedSocialAccount modelに追加。
public function user()
{
    return $this->belongsTo('App\User');
}

// $fillable配列を追加して、複数の値を保存できるようにする。
protected $fillable = ['provider_name', 'provider_id' ];

public function user()
{
    return $this->belongsTo('App\User');
}