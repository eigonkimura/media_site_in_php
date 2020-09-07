<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::redirect('/', '/home');

Route::any('/home', function () {
    echo 'Hello Home!';
});

Route::any('/tes', function () {
    echo 'Hello Home!';
});

Route::match(['get', 'post'], '/users', function () {

});

Route::match(['get', 'post', 'put', 'patch'], '/users/{id}', function(string $id) {
    echo "The user ID is: $id";
});

Route::get('/test/{mama}/user/{mia}', function ($ma, $mi) {
    echo ("maa: $ma => mia: $mi");
});

// É interessante mas tem que ver como trabalhar com o retorno.
// outra coisa é ter lógica de validação aqui. Não acho legal misturar aqui.
Route::get('usa/{name?}', function ($name = null) {
    echo "tipo null: $name";
})->where([
    'name' => '\w{1,3}'
]);

// localhost:8000/api/userss
Route::name('admin.')->group(function () {
    Route::get('userss', function () {
        // Route assigned name "admin.users"...
        echo ('admin -> user');
    })->name('users');
});

// Testar se já pega um usuário.
Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});
// Route::view('/home', 'home');

// Deve ser a ultima rota
Route::fallback(function () {
    //
    echo "Num achei porra nenhuma!";
});
