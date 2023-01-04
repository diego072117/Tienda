<x-app>
    <section class="container">
        <div id="container-info">	
	

            <div class="product-details">
                {{-- <p>{{$product->stock}}</p> --}}
    
                <h1>{{$product->name}}</h1>
                    <br>
                <span class="hint-star star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </span>

                <p class="information">{{$product->description}}</p>

                
                {{-- @if (Auth::user())
                <div class="control">
                    <button class="btn-info">

                        <span class="price">$/{{$product->precio}}</span>

                        <span class="shopping-cart-info"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>

                        <a href=""><span class="buy">Inicia sesion</span></a>
                    </button>
                </div>
                @else
                <div class="control">
                    <button class="btn-info">

                        <span class="price">$/{{$product->precio}}</span>

                        <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>

                    <a href=""><span class="buy">Inicia sesion</span></a>
                    </button>
                </div>
                @endif --}}
                        
            </div>
                
            <div class="product-image">
                
                @if ($product->image)
                    <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="..." style="width: 30em">
                @else 
                    <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" alt="..." style="width: 30em">
                @endif 
                
            </div>

        </div>
    </section>
        
        
</x-app>