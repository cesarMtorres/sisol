@extends("../layouts.plantilla")



@section("cabecera")

EDITAR REGISTROS 
@endsection



@section("contenido")



	<form method="post" action="/productos/{{ $producto->id}}">

		<table>
			<tr>
				<td>Nombre:</td>
				<td>
					
			
		<input type="text" name="nombreArticulo" value="{{ $producto->nombreArticulo }}">

		{{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">
                </td>
            </tr>

            <tr>
            	<td>Seccion</td>
            	<td><input type="text" name="seccion" value="{{ $producto->seccion }}"></td>
            </tr>

             <tr>
            	<td>Precio</td>
            	<td><input type="text" name="precio" value="{{ $producto->precio }}"></td>
            </tr>

             <tr>
            	<td>Fecha</td>
            	<td><input type="text" name="fecha" value="{{ $producto->fecha }}"></td>
            </tr>

             <tr>
            	<td>Pais Origen</td>
            	<td><input type="text" name="paisOrigen" value="{{ $producto->paisOrigen }}"></td>
            </tr>

            <tr>
            	<td>
            		
            	
		<input type="submit" name="enviar" value="Actualizar">
		</td><td>
			<input type="reset" name="Borrar" value="Limpiar">
		</td></td></tr></table>
	</form>

<form method="post" action="/productos/{{ $producto->id}}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Eliminar Registro">
@endsection



@section("pie")


@endsection