@extends('layouts.menu')
@section('title',"Producto{$product->id}")

@section('content')
<div class="card border-warning mb-3">
	<h4 class="card-header text-center ">PRODUCTO #{{ $product->id }}</h4>
	<div class="card-body">
		@if(Session::has('message'))
    		<div class="alert alert-success alert-dismissible">
    			<h6>
    				<left>{{Session::get('message')}}</left>
    			</h6>
      		</div>
      	@endif
      	<div class="row">
    		<div class="col">
    			<h4>
      				<p>Nombre del Producto: {{ $product->name }}</p>
      			</h4>
      			<br>
      			<h4>
					<p>Descripcion del Producto: {{ $product->description }}</p>
				</h4>
				<br>
				<h4>
					<p>Precio de Venta: {{ $product->priceV }}</p>
				</h4>
				<br>
				<h4>
					<p>Precio de Fabricacion: {{ $product->priceF }}</p>
    			</h4>
    		</div>
    		<div class="col">
		    	<img src='{{ asset("storage/$product->foto") }}' class="img-thumbnail" width="400" height="400">
		    </div>
  		</div>
  			<a href="{{route('products.index')}}"> ...Regresar al Listado de Productos</a>
				<br>
	</div>				
</div>
@endsection