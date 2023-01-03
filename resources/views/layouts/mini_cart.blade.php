<div class="shopping-cart">
    <div class="shopping-cart-header">
      <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{ $shopping_cart->quantity_of_products() }}</span>
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">{{ $shopping_cart->total_price() }}</span>
      </div>
    </div> <!--end shopping-cart-header -->

    <ul class="shopping-cart-items">
        @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)


        <li class="clearfix">
          @if ($shopping_cart_detail->product->image)
                  <img src="/storage/images/{{$shopping_cart_detail->product->image}}" class="card-img-top" alt="...">
            @else 
                  <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" alt="...">
            @endif 
            {{-- <img src="/storage/images/{{ $shopping_cart_detail->product->image}}" alt="item1" /> --}}
            <span class="item-name">{{ $shopping_cart_detail->product->name}}</span>
            <span class="item-price">$/{{ $shopping_cart_detail->product->precio}}</span>
        </li>

        {{-- <li class="clearfix">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
            <span class="item-name">KS Automatic Mechanic...</span>
            <span class="item-price">$1,249.99</span>
            <span class="item-quantity">Quantity: 01</span>
        </li> --}}
        @endforeach
    </ul>
    <a href="{{ route('cart.info') }}" class="button">Ver mas</a>
  </div> 

  
  
 