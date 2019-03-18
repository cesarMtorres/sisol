@extends('admin.template.main')

@section('title','Login')

@section('content')
	<form action="{{ route('admin.auth.login') }}" method="post">
	<div class="form-group">
		<label>Usuario</label>
		<input type="text" name="usuario" placeholder="usuario">
		<label>Password</label>
		<input type="password" name="password" placeholder="password">

	</div>
	<input type="submit" name="enviar" value="Accesder">
	</form>
@endsection