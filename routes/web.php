<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function (){
    Route::resource('posts', 'PostController')->names('blog.posts');
});

//Blog Admin
$group_data = [
    'namespace' =>  'Blog\Admin',
    'prefix'    =>  'admin/blog'
];
Route::group($group_data, function (){
    //BlogCategory
    $methods = ['index', 'create', 'store', 'edit', 'update'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');
});
