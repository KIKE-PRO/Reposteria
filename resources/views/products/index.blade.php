@extends('layouts.menu')
@section('title','Productos')
@section('content')
	<div class="d-flex justify-content-between align-items-end mb-3">		
			<h1 class="pb-2">{{ $title }} </h1>
		<p>
			<a  class="btn btn-warning" href="{{ route('products.create')}}">Nuevo Producto</a>
		</p>
	</div>
				@if($products->isNotEmpty())
					<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Producto</th>
					      <th scope="col">Descripcion</th>
					      <th scope="col">Precio de Venta</th>
					      <th scope="col">Precio de Produccion</th>
					      <th scope="col">Foto</th>
					      <th scope="col">Opciones</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($products as $product)
						    <tr>
						      <th scope="row">{{ $product->id }}</th>
						      <td>{{ $product->name }}</td>
						      <td>{{ $product->description }}</td>
						      <td>{{ $product->priceV }}</td>
						      <td>{{ $product->priceF }}</td>
						      <td><img src='{{ asset("storage/$product->foto") }}' width="60" height="60"/></td>
						      <td>
									<form action="{{ route('product.destroy',$product->id)}}" method="POST">
										{{ csrf_field()}}
										{{ method_field('DELETE')}}
										<a href="{{ route('product.show',$product->id)}}" class="btn btn-link">
						      				<span class="oi oi-eye"></span>
						      			</a> 
										<a href="{{ route('product.edit',$product->id)}}" class="btn btn-link">
											<span class="oi oi-pencil"></span>
										</a>
										<button type="submit" class="btn btn-link">
											<span class="oi oi-trash"></span>
										</button>
									</form>
						      </td>
						    </tr>
					    @endforeach
					  </tbody>
					</table>
				@else
					<p>No hay Usuarios Registrados</p>
				@endif
@endsection
@section('sidebar')
	@parent
@endsection