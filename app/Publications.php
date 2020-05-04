<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    protected $fillable=['pubTitle','publisher_id','property_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contacts');
    }
    public function properties()
    {
        return $this->belongsTo('App\Property');
    }
}
