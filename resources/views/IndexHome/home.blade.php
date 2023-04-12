@extends('layouts.app')
@section('content')
<div class="container">
<h1>BIENVENIDO A LA PAGINA PRINCIPAL</h1>

<a class="btn btn-primary" href="{{url('/products/')}}"> IR A PRODUCTOS </a>
<br>
<a class="btn btn-primary" href="{{url('/orders/')}}"> IR A LAS ORDENES </a>

</div>
@endsection