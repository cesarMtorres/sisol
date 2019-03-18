@extends("../layouts.plantilla")



@section("cabecera")

LEER REGISTROS 
@endsection



@section("contenido")

<table border="1">

	<tr>
		
		<td>
			Nombre Articulo
		</td>
		<td>
			Seccion
		</td>
		<td>
			Precio
		</td>
		<td>
			Fecha
		</td>
		<td>
			Pais de Origen
		</td>
	</tr>
	@foreach($productos as $producto)
	<tr>
		<td><a href="{{ route('productos.edit',$producto->id) }}">{{ $producto->nombreArticulo }}</a> </td>
		<td>{{ $producto->seccion }} </td>
		<td>{{ $producto->precio }} </td>
		<td>{{ $producto->fecha }} </td>
		<td>{{ $producto->paisOrigen }}</td>

</tr>
	@endforeach
</table>
@endsection



@section("pie")


@endsection