<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('posts',PostController::class);


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);

    Route::resource('products', 'ProductController');

});




// ErrorException 

// Route::middleware('auth:api')->group(function () {
//     Route::get('get-user', [PassportAuthController::class, 'userInfo']);

//     Route::resource('products', [ProductController::class]);

// });


// Array to string conversion

// at vendor/laravel/framework/src/Illuminate/Routing/ResourceRegistrar.php:416
//   412▕     protected function getResourceAction($resource, $controller, $method, $options)
//   413▕     {
//   414▕         $name = $this->getResourceRouteName($resource, $method, $options);
//   415▕ 
// ➜ 416▕         $action = ['as' => $name, 'uses' => $controller.'@'.$method];
//   417▕ 
//   418▕         if (isset($options['middleware'])) {
//   419▕             $action['middleware'] = $options['middleware'];
//   420▕         }

//     +6 vendor frames 
// 7   routes/api.php:33
//     Illuminate\Support\Facades\Facade::__callStatic("resource")

//     +3 vendor frames 
// 11  routes/api.php:35
//     Illuminate\Routing\RouteRegistrar::group(Object(Closure))
// www-data@251fd42b61a3:/app/app$ 
// www-data@251fd42b61a3:/app/app$ 
// www-data@251fd42b61a3:/app/app$ 
// www-data@251fd42b61a3:/app/app$ 
// www-data@251fd42b61a3:/app/app$ 
// www-data@251fd42b61a3:/app/app$  php artisan make:controller Api\PassportAuthController 