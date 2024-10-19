<?php

use App\Http\Controllers\customerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// importamos el controllador
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Routes for employees endpoints
Route::prefix("v0.1")->group(function () {
    // ruta para mostrar los empleados
    Route::get("/employees",[EmployeeController::class,"index"]);
    // ruta crear un usuario 
    Route::post("/employees",[EmployeeController::class,"store"]);
    // ruta para mostrar los datos de un usuario especifico
    Route::get("/employees/{id}",[EmployeeController::class,"show"]);
    // ruta para eliminar un usuario
    Route::delete("/employees/{id}",[EmployeeController::class,"destroy"]);
    // ruta pra actualizar los datos del empleado
    Route::put("/employees/{id}",[EmployeeController::class,"update"]);
    // ruta para actualizar datos especificos del empleado 
    Route::patch("/employees/{id}",[EmployeeController::class,"edit"]);
});


// Routes for products endpoints
Route::prefix("v0.1")->group(function (){

    // all products route
    Route::get("/products",[ProductController::class,"index"]);
    // create product route
    Route::post("/products",[ProductController::class,"store"]);
    // show a especific product route
    Route::get("/products/{id}",[ProductController::class,"show"]);
    // for update a product route
    Route::put("/products/{id}",[ProductController::class,"update"]); 
    // for update a product field route
    Route::patch("/products/{id}",[ProductController::class,"edit"]);
    // for delete a product route
    Route::delete("/products/{id}",[ProductController::class,"destroy"]);
});

// Routes for rols endpoints
Route::prefix("v0.1")->group(function (){
    // endpoint for show all rols
    Route::get("/rols",[RolController::class,"index"]);
    // endpoint for create a rol 
    Route::post("/rols",[RolController::class,"store"]);
    // endpoint for show a specific rol 
    Route::get("/rols/{id}", [RolController::class,"show"]);
    // endopoint for update all rols data 
    Route::put("/rols/{id}",[RolController::class,"update"]); #check endpoint
    // endpoint for update o edit just a rol data specific
    Route::patch("/rols/{id}",[RolController::class,"edit"]);
    // endpoint for delete a rol regitred
    Route::delete("/rols/{id}",[RolController::class,"destroy"]);
});

//groupe route sales endpoints
Route::prefix("v0.1")->group(function(){
    // endpoint for show all sale
    Route::get("/sales",[saleController::class,"index"]);
    // endpoint for create a sale
    Route::post("/sales",[saleController::class, "store"]);
    // endpoint for show a specific sale
    Route::get("/sales/{id}",[saleController::class, "show"]);
    // endpoint for update o edit just a sale data specific
    Route::patch("/sales/{id}",[saleController::class, "edit"]);
    // endopoint for update all sale data
    Route::put("/sales/{id}",[saleController::class, "update"]);
    // endpoint for delete a rol regitred
    Route::delete("/sales/{id}",[saleController::class, "destroy"]);

});

//groupe route customers endpoints
Route::prefix('v0.1')->group(function(){
    // endpoint for show all customer
    Route::get("/customers",[customerController::class,"index"]);
    // endpoint for create a customer
    Route::post("/customers",[customerController::class, "store"]);
    // endpoint for show a specific customer
    Route::get("/customers/{id}",[customerController::class, "show"]);
    // endpoint for update o edit just a sale data specific
    Route::patch("/customers/{id}",[customerController::class, "edit"]);
    // endopoint for update all sale data
    Route::put("/customers/{id}",[customerController::class, "update"]);
    // endpoint for delete a rol regitred
    Route::delete("/customers/{id}",[customerController::class, "destroy"]);
});


