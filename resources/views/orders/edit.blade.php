@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/orders/'.$products->id) }}" method="post" enctype='multipart/form-data' >
@csrf
{{ method_field('PATCH') }}

@include('orders.form');

</form>

</div>
@endsection