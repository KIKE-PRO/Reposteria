@extends('layouts.menu')

@section('title',"Editar Cliente")

@section('content')
<div class="card border-warning mb-3">
	<h4 class="card-header text-center">Editar cliente</h4>
	<div class="card-body">
		
@if(Session::has('message-error'))
    <div class="alert alert-danger">
    	<h6>
    		<left>{{Session::get('message-error')}}</left>
    	</h6>
    </div>
@endif
	<form method="POST" action="{{route('client.show',['client'=>$client])}}">
			
			{{-- metodo oculto para mandar la accion PUT a la vista ya que la vista no la recibe asi que mandamos a la vista el //metodo POST y de manera oculta el metodo --}}
			{{ method_field('PUT') }}

			{{--El middleware VerifyCsrfToken nos permite evitar que terceros puedan enviar peticiones de tipo POST a nuestra aplicación y realizar ataques de tipo cross-site request forgery. Para agregar un campo con el token dentro de nuestro formulario, que le va a permitir a Laravel reconocer peticiones de formulario que sean válidas, debemos llamar al método csrf_field():  --}}

			{{csrf_field()}}
			
	 <div class="form-row">
	    <div class="col-md-6 mb-3">
	      <label for="validationServer01">Nombre Completo</label>
	      	  <input type="text" maxlength="35" name="name" class="form-control" id="validationServer01" value="{{ old('name',$client->name) }}" required placeholder="Nombre Completo">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer02">DNI.</label>
	      <input type="number" name="dni" class="form-control" id="validationServer02" value="{{ old('dni',$client->dni) }}" required  placeholder="D.N.I.">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer03">TELEFONO</label>
	      <input type="number" name="phone" class="form-control" id="validationServer03" value="{{ old('phone',$client->phone) }}"  maxlength="11">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-8 mb-3">
	      <label for="validationServer04">DIRECCION</label>
	      <input type="text" maxlength="60" name="adress" class="form-control" id="validationServer04" value="{{ old('adress',$client->adress) }}"  maxlength="20">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-8 mb-3">
	      <label for="validationServer05">RED - SOCIAL</label>
	      <input type="text" maxlength="50" name="socialNetwork" class="form-control" id="validationServer05" value="{{ old('socialNetwork',$client->socialNetwork) }}"  maxlength="20">
	    </div>
	  </div>
	  <button class="btn btn-warning" type="submit">Actualizar Cliente</button>
	</form>
		<br>
		<a href="{{route('clients.index')}}">Regresar al Listado de Usuarios</a>
	</div>
</div>
@endsection