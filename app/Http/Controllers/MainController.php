<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Order;
use App\OrderProduct;
class MainController extends Controller
{
 	protected function mainView()
 	{	
 		$product = Product::all();
 		$cat = Category::all();
 		return view('home.mainView',['product'=>$product,'category'=>$cat]);
 	}

 	protected function listProduct(){
 		$product = Product::all();
 		return response($product);
 	}
 	protected function listCategories(){
 		$cat = Category::all();
 		return response($cat);
 	}
 	protected function pay(Request $r){
 		$products = $r->get('cart');
 		foreach ($product as $key => $value) {
 			# code...
 		}
 	}
}
