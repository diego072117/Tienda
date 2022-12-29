<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;

// Rutas User
Route::group(['prefix' => 'Users', 'controller' => UserController::class], function(){

    Route::get('/GetAllUsers', 'getAllUsers');//->GET trae data
    Route::get('/GetAnUser/{user}', 'getAnUser');//->GET trae data por id

    Route::get('/GetAllUsersWithLends', 'getAllUsersWithLends');//->GET trae data
    Route::get('/GetAllLendsByUser/{user}', 'getAllLendsByUser');//->GET trae data por id
   

    Route::post('/CreateUser', 'createUser');//->POST crea data
    Route::put('/UpdateUser/{user}', 'updateUsers');//->PUT actualza data
    Route::delete('/DeleteUser/{user}', 'deleteUsers');//->DELETE elimina data

});


//Rutas Categories
Route::group(['prefix' => 'Categories', 'controller' => CategorieController::class], function(){
    Route::get('/GetAllCategories', 'getAllCategories');//->GET trae data
    Route::get('/GetAnCategorie/{categorie}', 'getAnCategorie');//->GET trae data por id
    Route::post('/CreateCategorie', 'createCategorie');//->POST crea data
    Route::put('/UpdateCategories/{categorie}', 'updateCategories');//->PUT actualza data
    Route::delete('/DeleteCategories/{categorie}', 'deleteCategories');//->DELETE elimina data


});





