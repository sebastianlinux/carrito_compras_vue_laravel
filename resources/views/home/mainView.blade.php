@extends('layouts.layout')

@section('bodyApp')
	@include('layouts.navbar')
	<div class="container-fluid">
		<div class="row">.
			<div class="col-md-3 col-cat">
				Categorias
				<ul>
					@foreach($category as $c)
						<li>
							{{$c->name}}
						</li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-8 col-product">
				<div class="row">
					@foreach ($product as $p)
						<div class="col-md-3">
							<figure>
								<img  class="img-fluid"src="{{url('/product/'.$p->img)}}" alt="">
								<figcaption>{{$p->name}}</figcaption>	
							</figure>						
						</div>
					@endforeach
					
				</div>
			</div>
		
		</div>
	</div>

@endsection
