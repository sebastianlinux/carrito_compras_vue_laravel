@extends('layouts.layout')

@section('bodyApp')
	<nav-component></nav-component>
	<div class="container">
		<div class="header-orders">Pedidos Realizados en el sistema</div>
		<div class="row">

			<div class="col-md-12 col-orders">
				@foreach($order as $key => $value)
					<table class="table table-bordered">
						<tr>
							<th>Codigo Orden</th> <td>{{$value->id}}</td>
						</tr>
						<tr>
							<th>Descripcion</th> <td>{{$value->description}}</td>
						</tr>
						<tr>
							<th>Total pagado</th> <td class="bold">${{$value->total_pay}}</td>
						</tr>
					</table>
				
					<div class="font-16">
						Productos aquiridos <b>{{$value->products->count()}}</b>
					</div>
					
						<table class="table table-bordered">
							<tr>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Nombre</th>
								<th>Codigo</th>
								
							</tr>
							@foreach($value->products as $k => $prod)
								<tr>
									<td><img  class="img-fluid product-order-list" src="{{url('/product/'.$prod->productInfo->img)}}" alt=""></td> 
									<td> {{$prod->quantity}}</td>
									<td> {{$prod->productInfo->name}}</td>
									<td> {{$prod->productInfo->id}}</td>
								</tr>
							 @endforeach							
						</table>
					<b>Fin Orden #{{$value->id}}</b>
						<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>

				@endforeach
			</div>
		</div>
	</div>
@endsection
