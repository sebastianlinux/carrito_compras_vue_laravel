<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
class MainController extends Controller
{
 	protected function mainView()
 	{	
 		$product = Product::all();
 		$cat = Category::all();
 		return view('home.mainView',['product'=>$product,'category'=>$cat]);
 	}
}
