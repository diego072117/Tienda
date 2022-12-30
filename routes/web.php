<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function(){
    
     
      // $users = User::get(); 
      // foreach ($users as $user) {
      //   if($user->number_id == 1031643005){
      //     $user->assignRole('admin');
      //   }else{
      //     $user->assignRole('user');
      //   }
        
      // }
      // Role::create(['name' => 'user']);
      // return Role::all()->pluck('name');
});

Route::get('/', [ProductController::class,'showHomeWithProducts'])->name('home');

Route::group(['prefix'=>'Users','middleware' =>['auth', 'role:admin'], 'controller' => UserController::class], function(){

 // users
 Route::get('/','showAllUsers')->name('users');
  
 Route::get('/CreateUser','showCreateUser')->name('user.create');
 Route::post('/CreateUser','createUser')->name('user.create.post');

 Route::get('/EditUser/{user}','showEditUser')->name('user.edit');
 Route::put('/EditUser/{user}','updateUsers')->name('user.edit.put');

 Route::delete('/DeletetUser/{user}','deleteUsers')->name('user.delete');

});

Route::group(['prefix'=>'Products',['middleware' => ['auth', 'role:admin']],'controller' => ProductController::class], function(){

// products
Route::get('/','showProducts')->name('products');

Route::get('/Consultar/{product}','addToCart')->name('product.id');
Route::get('/InfoProduct/{product}','showInfoProducts')->name('product.info');

Route::get('/GetAllProducts', 'getAllProducts');//->GET trae data
Route::get('/GetAllProductsDataTable', 'getAllProductsForDataTable');//->GET trae data
Route::get('/GetAnProduct/{product}', 'getAnProduct');//->GET trae data por id
Route::post('/CreateProduct', 'createProduct');//->POST crea data
Route::post('/UpdateProduct/{product}', 'updateProduct');//->PUT actualza data
Route::delete('/DeleteProduct/{product}', 'deleteProduct');//->DELETE elimina data
  
});


//Rutas Categories
Route::group(['prefix' => 'Categories', 'controller' => CategorieController::class], function(){
  Route::get('/','showCategories')->name('categories');
  Route::get('/GetAllCategories', 'getAllCategories');//->GET trae data
  Route::get('/GetAllCategoriesForDataTable', 'getAllCategoriesForDataTable');//->GET trae data

  Route::get('/GetAnCategorie/{categorie}', 'getAnCategorie');//->GET trae data por id
  
  Route::post('/CreateCategorie', 'createCategorie');//->POST crea data

  Route::post('/UpdateCategorie/{categorie}', 'updateCategorie');//->PUT actualza data

  Route::delete('/DeleteCategories/{categorie}', 'deleteCategories');//->DELETE elimina data


});

Route::group(['controller' => LoginController::class], function(){

    // Login Routes..
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    

    // Logout Routes...
    Route::post('logout', 'logout')->name('logout');

});

Route::group(['controller' => ForgotPasswordController::class], function(){

  // Password Reset Routes...
Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
Route::post('password/email', 'sendResetLinkEmail')->name('password.email');

});

Route::group(['controller' => ResetPasswordController::class], function(){

    
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
  
  });   

Route::group(['controller' => ConfirmPasswordController::class], function(){

    // Password Confirmation Routes...
    Route::get('password/confirm', 'showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'confirm');
  
  });    


Route::group(['controller' => VerificationController::class], function(){

    // Email Verification Routes...

Route::get('email/verify', 'show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
Route::post('email/resend', 'resend')->name('verification.resend');
  
  });     
