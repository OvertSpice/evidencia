@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/products/'.$products->id) }}" method="post" enctype='multipart/form-data' >
@csrf
{{ method_field('PATCH') }}

@include('products.form');

</form>

</div>
@endsection