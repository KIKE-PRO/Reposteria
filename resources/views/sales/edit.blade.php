@extends('layouts.menu')

@section('title',"Editar Producto")

@section('content')
<div class="card border-warning mb-3">
	<h4 class="card-header text-center">Editar producto</h4>
	<div class="card-body">
		
	<form method="POST" action="{{route('product.show',['product'=>$product])}}">
			
			{{-- metodo oculto para mandar la accion PUT a la vista ya que la vista no la recibe asi que mandamos a la vista el //metodo POST y de manera oculta el metodo --}}
			{{ method_field('PUT') }}

			{{--El middleware VerifyCsrfToken nos permite evitar que terceros puedan enviar peticiones de tipo POST a nuestra aplicación y realizar ataques de tipo cross-site request forgery. Para agregar un campo con el token dentro de nuestro formulario, que le va a permitir a Laravel reconocer peticiones de formulario que sean válidas, debemos llamar al método csrf_field():  --}}

			{{csrf_field()}}
			
	 <div class="form-row">
	    <div class="col-md-6 mb-3">
	      <label for="validationServer01">PRODUCTO</label>
	      	  <input type="text" maxlength="50" name="name" class="form-control" id="validationServer01" value="{{ old('name',$product->name) }}" required placeholder="Producto">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-6 mb-3">
	      <label for="validationServer02">DESCRIPCION</label>
	      	  <input type="text" maxlength="70" name="description" class="form-control" id="validationServer02" value="{{ old('description',$product->description) }}"  placeholder="Descripcion">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer03">PRECIO DE VENTA</label>
	      <input type="number" disabled="disabled" name="priceV" class="form-control" id="validationServer03" value="{{ old('priceV',$product->priceV) }}" required  placeholder="Precio de Venta">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationServer04">PRECIO DE FABRICACION</label>
	      <input type="number" name="priceF" class="form-control" id="validationServer04" value="{{ old('priceF',$product->priceF) }}"  maxlength="11">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-8 mb-3">
	      <label for="validationServer05">FOTO</label>
	     <!-- <input type="file" maxlength="60" name="foto" class="form-control" id="validationServer05" value="{{ old('foto',$product->foto) }}">-->
	      <p>
			<img src="/imagesProducts/{{ $product->foto }}" width="100" height="100"/>
		</p>
	    </div>
	  </div>
	  <button class="btn btn-warning" type="submit">Actualizar Producto</button>
	</form>
		<br>
		<a href="{{route('products.index')}}">Regresar al Listado de Productos</a>
	</div>
</div>
@endsection