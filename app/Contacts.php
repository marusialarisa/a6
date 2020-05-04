<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable=['interested_id','publication_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function publications(){
        return $this->belongsTo('App\User');
    }
}
