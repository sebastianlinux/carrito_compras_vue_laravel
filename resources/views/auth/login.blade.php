<nav class="navbar navbar-expand-sm navbar-light bg-academy-login" data-toggle="affix">
    <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
        <a class="navbar-brand lato white" href="#">Real Academy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse  navbar-collapse text-center" id="navbar-academy">
            <ul class="navbar-nav">
                <li class="nav-item active">
                	@if ($errors->any())
					  	
					  		<p></p>
					  	
                	@endif
                    <form class="form-inline" method="POST" action="{{route('validateLogin')}}">
                    	@csrf
					  <div class="form-group mb-2">
					     <label for="inputPassword2" class="sr-only">Correo Electrónico</label>

					    <input type="text" id="email" value="{{old('email')}}" class="form-control form-control-sm"  
					     placeholder="Correo electrónico" name="email" >
					     {!!  $errors->first('email','<small class="msgerror">:message</small>')  !!}
					  </div>
					  <div class="form-group mx-sm-3 mb-2">
					    <label for="inputPassword2" class="sr-only">Clave</label>
					    <input type="password" value ="{{old('password')}}"class="form-control form-control-sm" 
					    name="password" placeholder="Clave">
					    {!! $errors->first('password','<small class="msgerror">:message</small>') !!}
					  </div>
					  
					  <button type="submit" class="lato fb connect  btn-sm mb-2">Iniciar sesión</button>
					</form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
 
 
</script>
