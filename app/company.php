<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class company extends Model
{
  
   use Notifiable;
	protected $table ='companies';
	public $primarykey ='id';
	public $timestamps =true;
	
	
	
	
	
	 public function employes(){
        return $this->hasMany('App\employe');
    }
}
