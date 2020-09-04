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
 		$total_pay = trim($r->get('total_pay'));
 		$order = ['description'=> 'Un pago realizado a través del sistema','total_pay' => $total_pay];

 		/*creamos la orden*/
 		$new_order = Order::create($order);

 		foreach ($products as $key => $value) {
 			$order_product = ["order_id"=>$new_order->id,
 								"product_id" => $value['id'],
 								'quantity' => $value['quantity']
 							];
 			OrderProduct::create($order_product);
 		}
 	}

 	private function array_map_assoc( $callback , $array ){
		$r = array();
		foreach ($array as $key=>$value)
		$r[$key] = $callback($key,$value);
		return $r;
	}

	protected function orders(){

		$order = Order::select('*')
						->with('products')
						->orderBy('id','desc')
						->get();
		return view('home.orders',['order'=>$order]);
	}
	protected function about(){
		return view('home.about');
	}
}
