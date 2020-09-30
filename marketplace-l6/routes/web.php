<?php

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

Route::get('/', function () {
    $helloWorld = "Hello World";
    return view('welcome', compact('helloWorld'));
//    return view('welcome', ['helloWorld' => $helloWorld]);
});

Route::get('/model', function() {
   $products = \App\Product::all();
   return $products;
});


// mass assignment
//$user = \App\User::create([
//   'name' => 'asdasd',
//   'email' => 'asdasd',
//   'password' => bcrypt('eaeaeae')
//]);


Route::get('/model', function() {
//    $user = \App\User::find(4);
//    return dd($user->store()->count());

    // produtos de uma loja
//    $loja = \App\Store::find(1);
//    return $loja->products()->where('id', 1)->get();


    // Criar uma loja para usuário
//    $user = \App\User::find(10);
//    $store = $user->store()->create([
//        'name' => 'Loja teste',
//        'description' => 'Loja teste',
//        'mobile_phone' => 'Loja teste',
//        'phone' => 'Loja teste',
//        'slug' => 'Loja teste',
//    ]);

    // Criar produto para uma loja
    $store = \App\Store::find(41);
    $product = $store->products()->create([
        'name' => 'produto teste',
        'description' => 'produto teste',
        'body' => 'produto teste',
        'price' => 'produto teste',
        'slug' => 'produto teste',
    ]);

    // Criar uma categoria
//    \App\Category::create([
//        'name' => 'category',
//        'slug' => 'category',
//    ]);
//
//    \App\Category::create([
//        'name' => 'category',
//        'slug' => 'category',
//    ]);
//
//    return \App\Category::all();

    // Adicionar produto para uma categoria
    $product = \App\Product::find(49);
    $product->categories()->sync([1, 2]);

});
