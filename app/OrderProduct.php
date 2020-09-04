<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	protected $table = 'order_product';
 	protected $fillable = ['id','order_id','product_id','quantity'];



 	public function productInfo(){
 		return $this->belongsTo('App\Product','product_id','id');
 	} 	
}
