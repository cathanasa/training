<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public $timestamps = true;

    public function projects(){
    	return $this->hasMany('App\Project');
    }
}
