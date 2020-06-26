@extends('layouts.menu')
@section('title','Ventas')
@section('content')
	<div class="d-flex justify-content-between align-items-end mb-3">		
			<h1 class="pb-2">{{ $title }} </h1>
		<p>
			<a  class="btn btn-warning" href="{{ route('sales.create')}}">Nueva Venta</a>
		</p>
	</div>
				@if($sales->isNotEmpty())
					<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">IdCliente</th>
					      <th scope="col">Comprobante</th>
					      <th scope="col">N° Comprobante</th>
					      <th scope="col">Estado</th>
					      <th scope="col">Total</th>
					      <th scope="col">Opciones</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($sales as $sale)
						    <tr>
						      <th scope="row">{{ $sale->id }}</th>
						      <td>{{ $sale->client_id }}</td>
						      <td>{{ $sale->tipo_comprobante }}</td>
						      <td>{{ $sale->numero_comprobante }}</td>
						      <td>{{ $sale->state }}</td>
						      <td>{{ $sale->total }}</td>
						      <td>
									<form action="{{ route('sale.destroy',$sale->id)}}" method="POST">
										{{ csrf_field()}}
										{{ method_field('DELETE')}}
										<a href="{{ route('sale.show',$sale->id)}}" class="btn btn-link">
						      				<span class="oi oi-eye"></span>
						      			</a> 
										<a href="{{ route('sale.edit',$sale->id)}}" class="btn btn-link">
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