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
})->name('welcome');

Route::resource('blog', 'front\BlogController');
Route::get('frontblog/blog/about', 'front\BlogController@about')->name('about');
Route::get('frontblog/blog/contact', 'front\BlogController@contact')->name('contact');
Route::get('frontblog/blog/categories', 'front\BlogController@categories')->name('categories');
Route::get('frontblog/blog/post/{clase}', 'front\BlogController@post')->name('post');
Route::get('frontblog/blog/post/{category}/category', 'front\BlogController@listClaseCategory')->name('clases-category');
Route::get('frontblog/blog/list-mis-clases', 'front\BlogController@listMisClases')->name('list-mis-clases');
Route::post('frontblog/blog/insert-clase-user', 'front\BlogController@insertClaseUser')->name('insert-clase-user');

Route::resource('dashboard/contact', 'dashboard\ContactController');

Route::resource('dashboard/post-comment', 'dashboard\PostCommentController')->only(['destroy']);
Route::get('dashboard/post-comment/{clase}/post', 'dashboard\PostCommentController@post')->name('post-comment.post');
Route::get('dashboard/post-comment/j-show/{postComment}', 'dashboard\PostCommentController@jshow');
Route::post('dashboard/post-comment/proccess/{postComment}', 'dashboard\PostCommentController@proccess');

Route::post('frontblog/blog/post/{clase}/comments', 'front\BlogController@createComment')->name('create-comment');

Route::get('dashboard/clase/inicio', 'dashboard\ClaseController@inicio')->name('inicio');

Route::match(['get', 'post'], 'calendario/index_calendario', 'dashboard\ClaseController@indexCalendario')->name('inicio-calendario');
Route::post('calendario/index_calendario', 'dashboard\ClaseController@storeCalendario')->name('store-calendario');
Route::get('calendario/show_calendario', 'dashboard\ClaseController@showCalendario')->name('show-calendario');
Route::put('calendario/index_calendario/{clase}', 'dashboard\ClaseController@updateCalendario')->name('update-calendario');
Route::delete('calendario/index_calendario/{clase}', 'dashboard\ClaseController@destroyCalendario')->name('delete-calendario');

Route::resource('dashboard/clase', 'dashboard\ClaseController');

Route::get('dashboard/clase/{clase}/list-users-clase', 'dashboard\ClaseController@listUsersClase')->name('list-users-clase');
Route::delete('dashboard/clase/destroy-user-clase/{user}', 'dashboard\ClaseController@destroyUserClase')->name('destroy-user-clase');

Route::post('dashboard/clase/descripcion_image', 'dashboard\ClaseController@descripcionImage');

Route::get('dashboard/clase/{category}/category-clase', 'dashboard\ClaseController@categoryClase')->name('category-clase');

Route::resource('dashboard/category', 'dashboard\CategoryController');

Route::resource('dashboard/user', 'dashboard\UserController');

Route::get('/create_customer', 'PaymentController@create_customer')->name('customer');
Route::get('/payment_method_register', 'PaymentController@payment_method_register')->name('payment_method_register');
Route::get('/payment_method_create', 'PaymentController@payment_method_create')->name('payment_method_create');
Route::get('/payment_method', 'PaymentController@payment_method')->name('payment_method');
Route::get('/create_only_pay_form/{clase}', 'PaymentController@create_only_pay_form')->name('create_only_pay_form');
Route::get('/create_only_pay', 'PaymentController@create_only_pay')->name('create_only_pay');
Route::get('/create_subscription', 'PaymentController@create_subscription')->name('create_subscription');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
