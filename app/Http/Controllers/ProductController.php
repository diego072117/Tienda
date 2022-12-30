<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function showProducts(){

        return view('products.index'); 

    }

    public function getAllProducts(){
      
        $products = Product::with('Category')->get();
        return response()->json(['products' => $products],200);

    }

    public function showHomeWithProducts(){

        $products = $this->getAllProducts()->original['products']; 
        
        return view('index',compact('products')); 

    }

    // public function getAllUsersWithProduct(){
      
    //     $products = Product::where('category_id','6')->get();
    //     return response()->json(['products' => $products],200);;

    // }

    public function getAnProduct(Product $product){

        $product->load('Category');
        return response()->json(['product' => $product],200);

    }

    public function createProduct(Request $request){

        $product = new Product($request->all());
        $this->uploadImages($request, $product);
        $product->save();
        return response()->json(['product' => $product->refresh()->load('Category')],201);

    }

    public function updateProduct(Product $product, Request $request){

        $requestAll = $request->all(); 
        $this->uploadImages($request, $product);
        $requestAll['image'] =$product->image;
        $product->update($requestAll);
        return response()->json(['product' => $product->refresh()],201);

    }

    private function uploadImages($request, &$product)
    {
        if (!isset($request->image)) return;
        $random = Str::random(8);
        $image_name = "{$random}.{$request->image->clientExtension()}";
        $request->image->move(storage_path('app/public/images'), $image_name);
        $product->image = $image_name;

        $image_name;
    }

    public function deleteProduct(Product $product){

        $product->delete();
        return response()->json([],204);

    }

    public function getAllProductsForDataTable(){
      
        $products = Product::with('Category');
        return DataTables::of($products)->addColumn('action', function ($row ){
            return "<a
            href='#'
            onclick='event.preventDefault();'
            data-id='{$row->id}'
            role='edit'
            class='btn btn-warning btn-sm'>Edit</a>
            <a
            href='#'
            onclick='event.preventDefault();'
            data-id='{$row->id}'
            role='delete'
            class='btn btn-danger btn-sm'>Delete</a>";
        })->rawColumns(['action'])->make();

    }

    public function showInfoProducts(Product $product)
    {
        return view('product.product-info',compact('product'));
    }

    public function addToCart(Product $product)
    {
        dd($product);
        // Cart::session(auth()->id)->add(array(
        //     'id' => $product->id,
        //     'name' => $product->name,
        //     'price' => $product->price,
        //     'quantity' => 1,
        //     'attributes' => array(),
        //     'associatedModel' => $Product
        // ));
    }
   
}
