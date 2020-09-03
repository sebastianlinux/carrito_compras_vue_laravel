<template>
	<div>
		<nav id="rootNav" ng-controller="StructureController" class="navbar navbar-expand-sm navbar-light bg-academy fixed-top" data-toggle="affix">
		  <div class="container">
		        <a href="/" class="navbar-brand lato navbar-realacademy">🥇 Kubo Store </a>
		        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbar9">
		            <span class="navbar-toggler-icon"></span>
		        </button>
		        
	        	<div class="navbar-collapse collapse" id="navbar-academy">
					<ul class="navbar-nav ml-auto">	
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0);"
					       		ng-click="seeV('friendV')" >
						         <img src="http://127.0.0.1:8000/icon/friend.svg" alt="" class="img-fluid icon-nav-real">
					        </a>
						</li>
						<li class="nav-item" >
						    <a class="nav-link" v-on:click="llamar" 
						    	ng-click="seeNotification()" href="javascript:void(0);">
						        <img src="http://127.0.0.1:8000/icon/notification.svg" alt="" class="img-fluid icon-nav-real" >
						    </a>
						</li>
						<li class="nav-item">
				            <a class="nav-link" href="/">Inicio</a>
				        </li>

				        <li class="nav-item">
				            <a class="nav-link" href="/">Promociones</a>
				        </li>
				        <li class="nav-item">
				            <a class="nav-link" href="/">Acerca de</a>
				        </li>
				        <li class="nav-item">
				            <a class="nav-link" href="/">Contactanos</a>
				        </li>
					</ul>
	      		</div>
	    </div>
	   </nav>
	 </div>
</template>	

<script>

	export default{	
		data(){
			return {
				user : []
			}
		},

		methods: {

		},

		mounted(){
			
			

		}

	}
</script>