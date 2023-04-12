@extends('layouts.app')
@section('content')
<div class="container">

<a href="{{ url('/') }}" class="btn btn-primary" > Regresar al menú principal </a>
</br>
<a href="{{ url('/products/create') }}" class="btn btn-success" > Registrar nuevo producto </a>
</br>
</br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>stock</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $products as $product )
        <tr>
            <td>{{ $product->id }}</td>
            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset ('storage').'/'.$product->Foto }}" width="50px" height="50x" alt="">
            </td>



            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                
            <a href="{{ url('/product/'.$product->id.'/edit') }}" class="btn btn-warning" >
                Editar
            </a>
            |

            <form action="{{ url('/product/'.$product->id ) }}" class="d-inline" method="post">
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