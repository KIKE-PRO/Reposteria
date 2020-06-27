@extends('layouts.menu')

@section('title',"Crear Cliente")

@section('content')
<div class="card border-warning mb-3" >
	<h4 class="card-header text-center">Crear cliente</h4>
	<div class="card-body">
		@if($errors->any())
			<div class="alert alert-danger">
				<h6>El D.N.I esta duplicado no puede ser creado.</h6>	
			</div>
		@endif
	<form method="POST" action="{{route('client.store')}}">
		{!!csrf_field()!!}
	  <div class="form-row">
	    <div class="col-md-6 mb-3">
	      <label for="validationServer01">Nombre Completo</label>
	      	  <input type="text" maxlength="35" name="name" class="form-control" id="validationServer01" value="{{ old('name') }}" required placeholder="Nombre Completo">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer02">DNI.</label>
	      <input type="number" name="dni" class="form-control" id="validationServer02" value="{{ old('dni') }}" required  placeholder="D.N.I.">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer03">TELEFONO</label>
	      <input type="number" name="phone" class="form-control" id="phone" value="{{ old('phone') }}"  maxlength="11"/>
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-8 mb-3">
	      <label for="validationServer04">DIRECCION</label>
	      <input type="text" maxlength="60" name="adress" class="form-control" id="validationServer04" value="{{ old('adress') }}"  maxlength="20">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-8 mb-3">
	      <label for="validationServer05">RED - SOCIAL</label>
	      <input type="text" maxlength="50" name="socialNetwork" class="form-control" id="validationServer05" value="{{ old('socialNetwork') }}"  maxlength="20">
	    </div>
	  </div>
	  <button class="btn btn-warning" type="submit">Crear usuario</button>
	</form>
				<a href="{{route('clients.index')}}">Regresar al Listado de Usuarios</a>
	</div>
</div>
@endsection