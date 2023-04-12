@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/products') }}" method="post" enctype='multipart/form-data' >
@csrf
@include('products.form');
    
</form>

</div>
@endsection