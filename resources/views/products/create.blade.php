@extends('layouts.menu')

@section('title',"Crear Producto")

@section('content')
<div class="card border-warning mb-3" >
	<h4 class="card-header text-center">Crear producto</h4>
	<div class="card-body">
	<form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
		{!!csrf_field()!!}
	  <div class="form-row">
	    <div class="col-md-6 mb-3">
	      <label for="validationServer01">PRODUCTO</label>
	      	  <input type="text" maxlength="50" name="name" class="form-control" id="validationServer01" value="{{ old('name') }}" required placeholder="Nombre Producto">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer02">DESCRIPCION</label>
	      <input type="text" maxlength="70" name="description" class="form-control" id="validationServer02" value="{{ old('description') }}"   placeholder="Descripcion">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer03">PRECIO DE VENTA</label>
	      <input type="number" name="priceV" class="form-control" id="validationServer03" value="{{ old('price.V') }}" required  maxlength="11">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer03">PRECIO DE FABRICACION</label>
	      <input type="number" name="priceF" class="form-control" id="validationServer04" value="{{ old('price.F') }}"  maxlength="11">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-8 mb-3">
	      <label for="validationServer04">foto</label>
	      <input type="file" name="foto" class="form-control" id="foto" value="{{ old('foto') }}">
	    </div>
	  </div>
	  <button class="btn btn-warning" type="submit">Crear Producto</button>
	</form>
		<a href="{{route('products.index')}}">Regresar al Listado de Productos</a>
	</div>
</div>
@endsection