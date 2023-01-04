<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    // public function showCategory(Product $products)
    // {
    //     return view('categories.juegos');
    // }

    public function getAllProducts(){
      
        $products = Product::with('Category')->where('category_id', 1)->get();
        return response()->json(['products' => $products],200);

    }

    public function getAllProductsCategoryTwo(){
      
        $products = Product::with('Category')->where('category_id', 2)->get();
        return response()->json(['products' => $products],200);

    }

    public function getAllProductsCategoryThree(){
      
        $products = Product::with('Category')->where('category_id', 3)->get();
        return response()->json(['products' => $products],200);

    }

    public function showHomeWithProductsCategoryJuegos(){

        $products = $this->getAllProducts()->original['products']; 
  
        
        return view('categories.juegos',compact('products')); 

    }

    public function showHomeWithProductsCategoryJuguetes(){


        $productss = $this->getAllProductsCategoryTwo()->original['products']; 
  
        
        return view('categories.juguetes',compact('productss')); 

    }

    public function showHomeWithProductsCategoryRopa(){

        $productsss = $this->getAllProductsCategoryThree()->original['products']; 
        
        return view('categories.ropa',compact('productsss')); 

    }

    public function showProducts(){

        return view('products.index'); 

    }

    public function getAllProductsOne(){
      
        $products = Product::with('Category')->where('category_id', 1)->take(4)->get();
        return response()->json(['products' => $products],200);

    }

    public function getAllProductsTwo(){
      
        $products = Product::with('Category')->where('category_id', 2)->take(4)->get();
        return response()->json(['products' => $products],200);

    }
    public function getAllProductsThree(){

        $products = Product::with('Category')->where('category_id', 3)->take(4)->get();
        return response()->json(['products' => $products],200);

    }


    public function showHomeWithProducts(){

        $products = $this->getAllProductsOne()->original['products']; 
        $productss = $this->getAllProductsTwo()->original['products']; 
        $productsss = $this->getAllProductsThree()->original['products']; 
        
        return view('index',compact('products','productss','productsss')); 

    }

   

    // public function getAllUsersWithProduct(){
      
    //     $products = Product::where('category_id','6')->get();
    //     return response()->json(['products' => $products],200);;

    // }

    public function getAnProduct(Product $product){

        $product->load('Category');
        return response()->json(['product' => $product],200);

    }

    public function createProduct(CreateProductRequest $request){

        $product = new Product($request->all());
        $this->uploadImages($request, $product);
        $product->save();
        return response()->json(['product' => $product->refresh()->load('Category')],201);

    }

    public function updateProduct(Product $product, UpdateProductRequest $request){

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

    // public function showCategory(Product $products)
    // {
    //     return view('categories.juegos',compact('products'));
    // }

    // public function getAllProductsForCategory(){

    //     $products = Product::with('Category')->get();
    //     return response()->json(['products' => $products],200);

    // }

    // public function showHomeWithForCategory(){

    //     $products = $this->getAllProducts()->original['products']; 
    //     $productss = $this->getAllProductsTwo()->original['products']; 
    //     $productsss = $this->getAllProductsThree()->original['products']; 
        
    //     return view('index',compact('products','productss','productsss')); 

    // }
    
   
}
