<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class employe extends Model
{
    //
    use Notifiable;
    
	protected $table ='employes';
	public $primarykey ='id';
	
	public $timestamps =true; 



public function  company(){
        return $this->belongsTo('App\company');
    }


}
