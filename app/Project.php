<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{	
    protected $fillable = ['name', 'customer_id', 'start_date', 
    'end_date', 'active', 'budget', 'description'];

    public function customer(){
    	return $this->belongsTo('App\Customer');
    }
}
