@extends('layouts.layout')

@section('bodyApp')
	<nav-component></nav-component>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img  class="img-fluid" src="{{url('product/'.$product->img)}}" alt="">
			</div>
			<div class="col-md-8">
				<h3>{{$product->name}}</h3>
				<div>{{$product->description}}</div>
				<div>Precio: $ {{$product->price}}</div>
				<div>&nbsp;</div>
				<a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
	</div>
@endsection
