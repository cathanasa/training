<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $table = 'projects';
	
    protected $fillable = ['id', 'name', 'customer', 'start_date', 
    'end_date', 'active', 'budget', 'description'];

    public $timestamps = false;
}
