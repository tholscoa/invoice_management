<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function clients(){
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }
}
