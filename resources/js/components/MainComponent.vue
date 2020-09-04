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
							    <div class="card-title">{{product.name}}</div>
							    <p class="card-text">
							    $ {{product.price}}
							</p>
							<a :href="'/product/'+product.id">Ver detalle</a>
								<div>&nbsp;</div>
							    <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-buy"
							    v-on:click="addCart(product.originalIndex)">Agregar/Comprar</a>
							  </div>
							</div>	
						</div>
					</div>
				</div>
			
			</div>
		</div>
		<div id="cartList">
			<div class="header">Tus productos ({{productQuantity}}) <span class="float-right close-cartList"
			 v-on:click="closeCartList()">X</span></div>
			<div v-for="(pro_cart,index) in cart" :key="pro_cart.id">
				<div class="row" v-if="pro_cart.status">
					<div class="col-md-6 ">
						<figure>
							<img class="img-fluid" :src="'product/'+pro_cart.img" alt="">
							<figcaption>{{pro_cart.name}}</figcaption>
						</figure>
						
					</div>
					<div class="col-md-6 col-cart-quantity">
						cantidad <input @change="updatePrice(index,$event)"  type="number" v-bind:value="pro_cart.quantity" class="product-quantity">
					</div>
				</div>
				
			</div>
			<div v-if="productQuantity" class="mb-5">
				<button  class="btn btn-success" v-on:click="pay(cart)">Realizar pago</button>	
				<div>Total a pagar: {{totalPay}}</div>
			</div>
			
			<div v-if="">
				<br><br>
				<h5 v-if="!productQuantity && !payCompleted">Tu carrito de compras esta vacio</h5>
				<h5 v-if="payCompleted">Pedido completado con éxito, puedes verificarlo en la sección de pedidos</h5>
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
				productQuantity: 0,
				newQuantity : 0,
				originalProducts : [],
				payCompleted : false,
				flagCartFill : false,
			}
		},
		methods: {
			addCart: function(index){
				this.payCompleted=false;
				this.cart[index]['status'] = true;
				this.cart[index]['quantity'] = parseInt(this.cart[index]['quantity'])+1;
	
				
				
 				this.productQuantity++;
				this.totalPay = this.totalPay+ parseInt(this.products[index]['price']);
				$("#quantity").html('('+this.productQuantity+')');
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

				if(this.newQuantity>this.cart[index]['quantity']){
					this.productQuantity++;
					this.cart[index]['quantity'] = this.cart[index]['quantity']+1;
					this.totalPay = this.totalPay + parseInt(this.cart[index]['price']);
	
				}else{  
					this.productQuantity = this.productQuantity-1;
					this.cart[index]['quantity'] = this.cart[index]['quantity']-1;
				this.totalPay = this.totalPay - parseInt(this.cart[index]['price']);
				} 
				if(this.newQuantity==0){
				 
					this.cart[index]['status'] = 0;
					this.cart[index]['quantity'] = 0;
				}else{
 	

				}
				$("#quantity").html('('+this.productQuantity+')');
				console.log(this.cart[index])
			},
			pay: function(products){
				var token=window.Laravel.csrfToken;
				this.$http.post('/pay',{cart:this.cart,total_pay:this.totalPay,_token:token}).then(response =>{
					console.log('PAGADO');
					/*si el pedido se realizo correctamente*/
					if(response.body.status){
						this.cart = [];
						this.productQuantity=0;
						$("#quantity").html('('+this.productQuantity+')');
						this.payCompleted=true;

					}
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
			/*inicia conteo carrito compras cantidad*/
			$("#quantity").html('('+this.productQuantity+')');
			this.$http.get('/listProduct').then(function(response){
			   /*console.log('response DOWN')
			   console.log(response.body)*/
			   this.products = response.body;
			   this.originalProducts = response.body;
			   this.cart = response.body
			   /*asigno status off a productos de carrito de compras*/
			   for(var i =0;i<this.cart.length;i++){
			   		this.cart[i]['status'] = 0;
			   		this.cart[i]['quantity'] = 0;
			   		this.products[i]['originalIndex'] = i;
			   }
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