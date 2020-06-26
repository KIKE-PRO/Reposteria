@extends('layouts.menu')
@section('title',"Producto{$product->id}")

@section('content')
<div class="card border-warning mb-3">
	<h4 class="card-header text-center ">PRODUCTO #{{ $product->id }}</h4>
	<div class="card-body">
		<p>Nombre del Producto: {{ $product->name }}</p>
		<p>Descripcion del Producto: {{ $product->description }}</p>
		<p>Precio de Venta: {{ $product->priceV }}</p>
		<p>Precio de Fabricacion: {{ $product->priceF }}</p>
		<p>
			<img src="/imagesProducts/{{ $product->foto }}" width="300" height="300"/>
		</p>
	</div>
				<a href="{{route('products.index')}}"> ...Regresar al Listado de Productos</a>
				<br>
</div>
	
@endsection
