<template>
	<div>
		<nav-component :callTo="openCartList"></nav-component>

		<div class="container-fluid">
			<div class="row">.
				<div class="col-md-3 col-cat">
					<b class="nav-link">Categorias</b>
					<ul class="nav flex-column">
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link" 
							v-on:click="unFilter()">Todas las categorias</a>
					</li>
					  <li v-for="category in categories" class="nav-item">
					    <a class="nav-link"
					    	v-on:click="filter(category.id)"
					     href="#">{{category.name}}</a>
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
							    <a href="javascript:void(0);" class="btn btn-primary btn-buy"
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
			<div v-for="(product,index) in cart" :key="product.id">
				<div class="row">
					<div class="col-md-6">
						{{product.name}} 
					</div>
					<div class="col-md-6">
						cantidad <input @change="updatePrice(index,$event)"  type="number" v-bind:value="product.quantity" class="product-quantity">
					</div>
				</div>
				
			</div>
			<div v-if="cart.length">
				<button  class="btn btn-success" v-on:click="pay(cart)">Realizar pago</button>	
				<div>Total a pagar: {{totalPay}}</div>
			</div>
			
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
				totalPay : 0,
				productQuantity: 1,
				newQuantity : 0,
				originalProducts : [],
			}
		},
		methods: {
			addCart: function(index){
				if(this.products[index]['quantity']>0){
					this.products[index]['quantity'] = this.products[index]['quantity']+1;
				}else{
					this.products[index]['quantity'] = 1;
					this.cart.push(this.products[index]);
				}
				this.totalPay = this.totalPay+ parseInt(this.products[index]['price']);
				console.log('Empuje a')
				console.log(this.products[index])
				$("#quantity").html('('+this.cart.length+')');
			},
			openCartList: function(){
				$("#cartList").fadeIn(300);
			},
			closeCartList: function(){
				$("#cartList").fadeOut(300);
			},
			updatePrice: function(index,event){
				/*obteniendo el valor actualizado de la cantidad*/
				this.newQuantity =  $(event.srcElement).val();
				if(this.newQuantity==0){
					this.totalPay = this.totalPay - parseInt(this.cart[index]['price']);
					this.cart.splice(index, 1);
				}else{
					if(this.newQuantity > this.cart[index]['quantity']){
						this.totalPay = this.totalPay + parseInt(this.cart[index]['price']);
					}else{
						this.totalPay = this.totalPay - parseInt(this.cart[index]['price']);
					}
				}
				$("#quantity").html('('+this.cart.length+')');
				this.cart[index]['quantity'] =this.newQuantity;
				console.log(this.cart[index])
			},
			pay: function(products){
				var token=window.Laravel.csrfToken;
				this.$http.post('/pay',{cart:this.cart,total_pay:this.totalPay,_token:token}).then(response =>{
					console.log('PAGADO');
					console.log(response)
				},function(error){
					alert('error trying connect');
					console.log(error)
				});
			},
			filter: function(id){
				this.products = this.originalProducts;
				 this.products = this.products.filter(function(e){
				 	return e.category_id == id;
				 })
			},
			unFilter: function(){
				this.products = this.originalProducts;
			}
		},

		mounted(){
			
			this.$http.get('/listProduct').then(function(response){
			   console.log('response DOWN')
			   console.log(response.body)
			   this.products = response.body;
			   this.originalProducts = response.body;
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