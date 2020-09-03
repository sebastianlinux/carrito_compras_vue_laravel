<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'product';
 	protected $fillable = ['name','category_id','img','description','price','visits'];
}
