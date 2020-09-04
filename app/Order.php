<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';
 	protected $fillable = ['id','description','total_pay'];


 	public function products(){
 		return $this->hasMany('App\OrderProduct')->with('productInfo');
 	}
}
