<x-app>
    <div class="title-categorie">
        <h1>Juguetes</h1>
     </div>
     <section class="container-cards">
        
        @foreach ($productss as $product)
      
   
       
        <div class="container-cards">
           <div class="card-home">
               <div class="imgBx">
                 @if ($product->image)
                 <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="...">
                 @else 
                 <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" alt="...">
                 @endif 
               </div>
               <div class="content">
                   <div class="details">
                       <h2>{{ $product->name }}<br><span>$/{{ $product->precio}}</span></h2>
                      
                       <div class="actionBtn">
                          @if (Auth::user())
                          {!! Form::open(['route'=>'shopping_cart_details', 'method'=>'POST']) !!}
                          <input type="hidden" name="product_id" value="{{$product->id}}">
                          <input type="hidden" name="quantity" value="1">
                          <button type="submit" class="btn btn-primary">Carrito</button>
                          {!! Form::close() !!}
                          <a href="{{ route('product.info',['product' => $product->id]) }}" class="btn btn-primary">ver mas</a>
                          @else
                          <a href="{{ route('product.info',['product' => $product->id]) }}" class="btn btn-primary">ver mas</a>
                          @endif
                          
                     
                       </div>
                   </div>
               </div>
           </div>
       </div>
   
        @endforeach
  
     </section>
</x-app>