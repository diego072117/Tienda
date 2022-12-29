<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Categorie\CreateCategorieRequest;
use App\Http\Requests\Categorie\UpdateCategorieRequest;

class CategorieController extends Controller
{
    public function getAllCategories(){
      
        $categories = Category::get();
        return response()->json(['categories' => $categories],200);

    }

    // public function showHomeWithCategories(){

    //     $categories = $this->getAllCategories()->original['categories']; 
        
    //     return view('index',compact('categories')); 

    // }

    public function getAnCategorie(Category $categorie){

        return response()->json(['categorie' => $categorie],200);

    }

    public function createCategorie(CreateCategorieRequest $request){

        $categorie = new Category($request->all());
        $categorie->save();
        return response()->json(['categorie' => $categorie],201);

    }

    public function updateCategorie(Category $categorie, UpdateCategorieRequest $request){

        
        $categorie->update($request->all());
        return response()->json(['categorie' => $categorie->refresh()],201);

      
    }

    public function deleteCategories(Category $categorie){

     
        $categorie->delete();
        return response()->json([],204);

    }
    
    public function showCategories(){

        return view('categories.index'); 

    }
    
    public function getAllCategoriesForDataTable()
    {
        $categories = Category::get();
        return DataTables::of($categories)
            ->addColumn('action', function ($row) {
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
            })
            ->rawColumns(['action'])
            ->make();
    }

}
