    <div class="form-group">
    <label for='product_id'> ID del producto</label>
    <select class="form-select" name="product_id" id="product_id">
        @foreach ($products as $product)
            <option value="{{$product->id}}">{{ $product->name }}</option>
        @endforeach

    </select>
    </div>

    <div class="form-group">
    <label for='quantity'> Cantidad</label>
    <input type="number" class="form-control" name="quantity" value="{{isset($orders->quantity)?$orders->quantity:' '}}" id="quantity"> 
    </div>
    
    <div class="form-group">
    <label for='unit_price'> Precio unitario</label>
    <input type="number" class="form-control" name="unit_price" value="{{isset($orders->unit_price)?$orders->unit_price:' '}}" id="unit_price"> 
    </div>

    <div class="form-group">
    <label for='total_price'> Precio total</label>
    <input type="number" class="form-control" name="total_price" value="{{isset($orders->total_price)?$orders->total_price:' '}}" id="total_price"> 
    </div>

    <div class="form-group">
    <label for='status'> Status</label>
    <select class="form-select" name="status" id="status">
        <option value="En proceso" id="En proceso">En proceso</option>
        <option value="En ruta" id="En ruta">En ruta</option>
        <option value="Entregado" id="Entregado">Entregado</option>
    </select>
    </div>

    <input class="btn btn-success" type="submit" value='Guardar cambios'>
    <a class="btn btn-primary" href="{{url('/orders/')}}"> REGRESAR </a>