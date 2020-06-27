@extends('layouts.menu')

@section('title',"Crear Venta")

@section('content')

<h4 class="card-header text-center">Nueva venta</h4>
<br>
<form method="POST" action="{{route('sale.store')}}" enctype="multipart/form-data">
		{!!csrf_field()!!}
<div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="id">Cliente</label>
      	<select id="data_client" class="selectpicker form-control" data-live-search="true" data-live-search-placeholder="Buscar">
	  		<option selected disabled>-- Elija el Cliente --</option>
	  		@foreach($clients as $client)
	  	  		<option value="{{ $client->id }}_{{ $client->dni }}">{{ $client->name }}</option>
	  	  	@endforeach
      	</select>
      	<input type="hidden" name="client" id="client"/>
    </div>
    <div class="col-md-6 mb-3">
      <label for="dni">D.N.I</label>
      	<input type="number" name="dni" id="dni" class="form-control" placeholder="D.N.I" disabled="disabled" />	
    </div>
    <div class="col-md-6 mb-3">
      <label for="id">Tipo de Comprobante</label>
      	<select name="comprobante" class="form-control" name=tipoComprobante>	
      		<option value="factura">Factura</option>
      		<option value="recibo">Recibo</option>
      		<option value="boleta">Boleta</option>
      		<option value="otro">Otro</option>
      	</select>
 	</div>
  <div class="col-md-6 mb-3">
      <label for="numeroComprobante">N° de Comprobante</label>
      	<input type="text" class="form-control" size="35" name="numeroComprobante"/>	
    </div>
 </div>
    
<div class="card border-warning mb-3" >
	<div class="card-body">
	<div class="form-row">
		<div class="col-xs-6 col-sm-3">
	      <label for="id">Productos</label>
	      	<select id="data_product" class="selectpicker form-control" data-live-search="true" data-live-search-placeholder="Buscar">
	      		<option selected disabled>-- Elija el Producto --</option>
		  		@foreach($products as $product)
		  	  		<option value="{{ $product}}">{{$product->name}} </option>
		  	  @endforeach
	      	</select>
	      	<input type="hidden" name="product" id="product"/>
	    </div>
	    <div class="col-xs-6 col-sm-3">
      		<label for="dni">Cantidad</label>
      		<input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad" min="1" />	
   		</div>
   		<div class="col-xs-6 col-sm-3">
	      <label for="precioV">Precio Venta</label>
	      <input type="number" id="precioV" name="precio_venta" class="form-control" placeholder="Precio de Venta">
	    </div>
	    <div class="col-xs-6 col-sm-3">
	      <label for="validationServer05">FOTO</label>
			<img id="foto" src='{{ asset("storage/uploads/sinFoto.jpeg") }}' width="100" height="100"/>
	    </div>
	    <button class="btn btn-warning" type="button" onclick="agregarProducto()">Agregar Producto</button>
	    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	    	  <br>
	    	<table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
	    		<thead class="thead-dark">
	    			<th>Producto</th>
	    			<th>Cantidad</th>
	    			<th>Precio de Venta</th>
            <th>Image</th>
	    			<th>Sub Total</th>
            <th>Opciones</th>

	    		</thead>
	    		<tfoot>
	    			<th>TOTAL=></th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    			<th><h6 id="total">S/. 0.00 </h6><input type="hidden" name="totalVenta" id="totalVenta"></th>
	    		</tfoot>
	    	</table>
	    </div>
	</div> 
	</form>
		<button class="btn btn-warning" type="submit" id="guardar">Crear Venta</button>
	</div>
</div>
@push('scripts')
	<script>

    var productsFactura = [];
  
		$(document).ready(function(){
			$('#agregarProducto').click(function(){
				agregar();
			});
		});
		var contador=0;
		total=0;
		subTotal=[];
		$("#guardar").hide();
		$('#data_client').change(mostrarDni);
		$('#data_product').change(mostrarDataProduct);
		
		function mostrarDni()
		{
			dataClient=document.getElementById('data_client').value.split('_');
			$("#client").val(dataClient[0]);
			$("#dni").val(dataClient[1]);
		}
		function mostrarDataProduct()
		{
      
			dataProduct = document.getElementById('data_product').value;
      
      productoJson = JSON.parse(dataProduct);

			$("#precioV").val(productoJson.priceV);
			var image=document.getElementById("foto");
			image.src="http://127.0.0.1:8000/storage/"+productoJson.foto;
			$("#product").val(productoJson);
		}
		function agregar()
		{
			producto=$('products option:selected').text();
		}
		function limpiar()
		{
			$("#cantidad").val("");
		}
		function ocultar()
		{
			if (total>0)
			{
				$("#guardar").show();
			}
			else
			{
				$("#guardar").hide();
			}
		}
		function updateDni(dni) 
		{
			console.log()
		  document.querySelector("#num").textContent = e.detail;
		}

    function agregarProducto(){
      var cantidad = $("#cantidad").val()

      if(cantidad == ''){
        
        console.log('cantidad esta vacio')

        return;
      }

      dataProduct = document.getElementById('data_product').value;

      productoJson = JSON.parse(dataProduct)
      
      productoJson.qty = parseInt($("#cantidad").val());

      productsFactura.push(productoJson)


      var fila ="<tr><td>"+productoJson.name+"</td><td>"+productoJson.qty+"</td><td>"+productoJson.priceV+"</td><td><img src='http://127.0.0.1:8000/storage/"+productoJson.foto+"' alt='' width='50px' /></td><td>subTotal</td> <td><button class='btn btn-warning'>Eliminar</button></td><tr>"

      $("#detalle").append(fila);
    }
  

	</script>	
@endpush
@endsection