@extends('layouts.app')
@section('content')
<div class="container">

<a href="{{ url('/') }}" class="btn btn-primary" > Regresar al menú principal</a>
</br>
<a href="{{ url('/orders/create') }}" class="btn btn-success" > Registrar nueva orden</a>
</br>
</br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>product_id</th>
            <th>quantity</th>
            <th>unit_price</th>
            <th>total_price</th>
            <th>status</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $orders as $order )
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->product_id }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->unit_price }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->status }}</td>
            <td>
                
            <a href="{{ url('/order/'.$order->id.'/edit') }}" class="btn btn-warning" >
                Editar
            </a>
            |

            <form action="{{ url('/order/'.$order->id ) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar este elemento?')" value='Borrar'>
            </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection