@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/orders') }}" method="post" enctype='multipart/form-data' >
@csrf
@include('orders.form');
    
</form>

</div>
@endsection