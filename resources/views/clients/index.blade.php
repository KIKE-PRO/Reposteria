@extends('layouts.menu')
@section('title','Clientes')
@section('content')
	<div class="d-flex justify-content-between align-items-end mb-3">		
			<h1 class="pb-2">{{ $title }} </h1>
		<p>
			<a  class="btn btn-warning" href="{{ route('client.create')}}">Nuevo Cliente</a>
		</p>
	</div>
				@if($clients->isNotEmpty())
					<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">D.N.I</th>
					      <th scope="col">Telefono</th>
					      <th scope="col">Direccion</th>
					      <th scope="col">Red Social</th>
					      <th scope="col">Opciones</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($clients as $client)
						    <tr>
						      <th scope="row">{{ $client->id }}</th>
						      <td>{{ $client->name }}</td>
						      <td>{{ $client->dni }}</td>
						      <td>{{ $client->phone }}</td>
						      <td>{{ $client->adress }}</td>
						      <td>{{ $client->socialNetwork }}</td>
						      <td>
									<form action="{{ route('client.destroy',$client->id)}}" method="POST">
										{{ csrf_field()}}
										{{ method_field('DELETE')}}
										<a href="{{ route('client.show',$client->id)}}" class="btn btn-link">
						      				<span class="oi oi-eye"></span>
						      			</a> 
										<a href="{{ route('client.edit',$client->id)}}" class="btn btn-link">
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
					{{$clients->links()}}
				@else
					<p>No hay Usuarios Registrados</p>
				@endif
@endsection
@section('sidebar')
	@parent
@endsection
