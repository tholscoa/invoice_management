<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'client_name', 'email', 'phone','other_details'
    ];

    public function projects(){
        return $this->hasMany('App\Project', 'id', 'client_id');
    }
}
