<x-app title="Tienda">
   <h1>Juegos</h1>
   <section class="d-flex justify-content-center flex-wrap">
      
      @foreach ($products as $product)
      
      @if ($product->category_id == 1)
         <div class="card mx-3 my-3" style="width: 18rem;">
            @if ($product->image)
                  <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="...">
            @else 
                  <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" alt="...">
            @endif 

         
            <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">${{ $product->precio}}</p>
            <a href="#" class="btn btn-primary">Lend</a>
            </div>
         </div> 
         @endif
       
      @endforeach

   </section>
   <h1>Jueguetes</h1>
   <section class="d-flex justify-content-center flex-wrap">
     
      @foreach ($products as $product)
         @if ($product->category_id == 2)
            <div class="card mx-3 my-3" style="width: 18rem;">
               @if ($product->image)
                     <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="...">
               @else 
                     <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" alt="...">
               @endif 

               <div class="card-body">
               <h5 class="card-title">{{ $product->name }}</h5>
               <p class="card-text">${{ $product->precio}}</p>
               <a href="#" class="btn btn-primary">Lend</a>
               </div>
            </div> 
         @endif
      @endforeach

   </section>
   <h1>Ropa</h1>
   <section class="d-flex justify-content-center flex-wrap">
     
      @foreach ($products as $product)
         @if ($product->category_id == 3)
            <div class="card mx-3 my-3" style="width: 18rem;">
               @if ($product->image)
                     <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="...">
               @else 
                     <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" alt="...">
               @endif 

               <div class="card-body">
               <h5 class="card-title">{{ $product->name }}</h5>
               <p class="card-text">${{ $product->precio}}</p>
               <a href="#" class="btn btn-primary">Lend</a>
               </div>
            </div> 
         @endif
      @endforeach

   </section>
</x-app>
