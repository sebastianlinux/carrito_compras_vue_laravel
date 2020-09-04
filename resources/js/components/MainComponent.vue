<template>
	<div>
		<nav-component :callTo="openCartList"></nav-component>

		<div class="container-fluid">
			<div class="row">.
				<div class="col-md-3 col-cat">
					Categorias
					<ul class="nav flex-column">
					  <li v-for="category in categories" class="nav-item">
					    <a class="nav-link active" href="#">{{category.name}}</a>
					  </li>
					</ul>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-3 d-flex align-items-stretch col-product" v-for="(product,index) in products"  :key="product.id">
							<div class="card">
							  <img  class="img-fluid" 
							  :src="'/product/'+product.img" 
							  alt="">
							  <div class="card-body">
							    <h5 class="card-title">{{product.name}}</h5>
							    <p class="card-text">
							    $ {{product.price}}
							</p>
							    <a href="#" class="btn btn-primary btn-buy"
							    v-on:click="addCart(index)">Agregar/Comprar</a>
							  </div>
							</div>	
						</div>
					</div>
				</div>
			
			</div>
		</div>
		<div id="cartList">
			<div class="header">Tus productos <span class="float-right close-cartList"
			 v-on:click="closeCartList()">X</span></div>
			<div v-for="product in cart" :key="product.id">
				<div class="row">
					<div class="col-md-6">
						{{product.name}} 
					</div>
					<div class="col-md-6">
						cantidad <input type="number" value="1" class="product-quantity">
					</div>
				</div>
				
			</div>
			<button v-if="cart.length" class="btn btn-success">Realizar pago</button>
			<div v-if="!cart.length">
				<h5>Tu carrito de compras esta vacio</h5>
			</div>
		</div>
	</div>

</template>	

<script>
	import NavComponent from './NavComponent.vue';
	export default{	
		components: {
			NavComponet: NavComponent
		},		
		data(){
			return {
				products: [],
				cart: [],
				categories: [],
			}
		},
		methods: {
			addCart: function(index){
				this.cart.push(this.products[index]);
				$("#quantity").html('('+this.cart.length+')');
			},
			openCartList: function(){
				$("#cartList").fadeIn(300);
			},
			closeCartList: function(){
				$("#cartList").fadeOut(300);
			}
		},

		mounted(){
			
			this.$http.get('/listProduct').then(function(response){
			   console.log('response DOWN')
			   console.log(response.body)
			   this.products = response.body;
			}, function(error){
			   alert('cannot connect.');
			   console.log(error)
			});

			this.$http.get('/listCategories').then(function(response){
			   //console.log('response DOWN')
			   console.log(response.body)
			   this.categories = response.body;
			}, function(error){
			   alert('cannot connect.');
			   console.log(error)
			});
		}

	}
</script>