<x-app>
    <section class="container my-5" >
      
        <table class="table">
            <thead>
              <tr>
                <th>miniatura</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th >Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
              <tr>
                <td>
                    @if ($shopping_cart_detail->product->image)
                    <img src="/storage/images/{{$shopping_cart_detail->product->image}}" class="card-img-top" style="width: 5em">
                    @else 
                    <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" style="width: 5em">
                    @endif 
                </td>
                <td>{{ $shopping_cart_detail->product->name}}</td>
                <td>$/{{ $shopping_cart_detail->product->precio}}</td>
                <td><input type="number" name="quantity" value="{{ $shopping_cart_detail->quantity}}"></td>
                <td>$/{{ $shopping_cart_detail->total()}}</td>
                <td class="d-flex">
                    {{-- <button class="btn btn-warning btn-sm">actualiza</button> --}}
                    <button class="btn btn-danger btn-sm">eliminar</button>
                </td>
               
              </tr>
              @endforeach
            </tbody>
          </table>
     

    </section>
</x-app>