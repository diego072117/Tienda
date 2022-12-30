<x-app>
    <section class="container my-5">
        <div class="card">

            <div class="card-header">
            <h2>INFO Producto</h2>
            </div>

            <div class="card-body">

                {{-- <form action="{{route('user.edit.put',['user' => $user->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <x-user.form-user :user="$user" :roles="$roles "/>
                </form> --}}
                
                @if ($product->image)
                <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="...">
                @else 
                <img src="https://i.pinimg.com/564x/df/d7/96/dfd7966a504c43881b4b874d2ec6ae8d.jpg" class="card-img-top" alt="..." style="width: 30em">
                @endif 
                <p>{{$product->name}}</p>
                <p>{{$product->stock}}</p>
                <p>{{$product->precio}}</p>
                <p>{{$product->description}}</p>
                
            </div>
        </div>
    </section>
</x-app>