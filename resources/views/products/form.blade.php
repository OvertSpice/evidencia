    <div class="form-group">
    <label for='name'> Nombre producto</label>
    <input type="string" class="form-control" name="name" value="{{isset($products->name)?$products->name:' '}}" id="name"> 
    </div>

    <div class="form-group">
    <label for='description'> Descripción</label>
    <input type="string" class="form-control" name="description" value="{{isset($products->description)?$products->description:' '}}" id="description"> 
    </div>

    <div class="form-group">
    <label for='image'></label>
    @if(isset($products->image))
    <img class="img-thumbnail img-fluid" width="50px" height="50x" src="{{asset('storage'.'/'.$products->image)}}"/>
    @endif
    <input type="file" class="form-control" name='image' value='' id='image'>
    </div>

    <div class="form-group">
    <label for='price'> Precio</label>
    <input type="integer" class="form-control" name="price" value="{{isset($products->price)?$products->price:' '}}" id="price"> 
    </div>

    <div class="form-group">
    <label for='stock'> Stock</label>
    <input type="integer" class="form-control" name="stock" value="{{isset($products->stock)?$products->stock:' '}}" id="stock"> 
    </div>

    <input class="btn btn-success" type="submit" value='Guardar cambios'>
    <a class="btn btn-primary" href="{{url('/products/')}}"> REGRESAR </a>