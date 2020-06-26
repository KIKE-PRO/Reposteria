@extends('layouts.menu')
@section('title',"Cliente{$client->id}")

@section('content')
<div class="card border-warning mb-3">

<h4 class="card-header text-center ">CLIENTE #{{ $client->id }}</h4>
	<div class="card-body">
		@if(Session::has('message'))
    		<div class="alert alert-success alert-dismissible">
    			<h6>
    				<left>{{Session::get('message')}}</left>
    			</h6>
      		</div>
      	@endif
		<p>Nombre del Cliente: {{ $client->name }}</p>
		<p>D.N.I del Cliente: {{ $client->dni }}</p>
		<p>Telefono del Cliente: {{ $client->phone }}</p>
		<p>Direccion del Cliente: {{ $client->adress }}</p>
		<p>Red Social del Cliente: {{ $client->socialNetwork }}</p>
	</div>
				<a href="{{route('clients.index')}}"> ...Regresar al Listado de Usuarios</a>
				<br>
</div>
	
@endsection
