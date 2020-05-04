<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable=['description','price','user_id','photo'];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function publications(){
        return $this->hasOne('App\Publications');
    }
}
