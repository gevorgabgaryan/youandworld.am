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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Numerus\Mail\ContactMail;

Route::get('/', function () {
    return redirect(app()->getLocale());
});
Route::group([
	'prefix' => '{locale}',
	'where' => ['locale' => '[a-zA-Z]{2}'],
	'middleware' => 'setlocale',

], function() {
Route::resource('/', 'IndexController', ['only' => ['index', 'show'],'names'=>['index'=>'home']
]);

Route::get('services', 'ServiceController@index')->name('service');

Route::resource('articles', 'ArticlesController', [

	"parametrs" => [

		'articles' => 'alias',

	],
	'names'=>['index'=>'article']

]);
Route::resource('poems', 'PoemsController', [

	"parametrs" => [

		'articles' => 'alias',

	],
	'names'=>['index'=>'poem'],

]);


Route::resource('comment', 'CommentController', [
	'only' => ['store']	,
	'names'=>['index'=>'comment']

]);

Route::get('articles/Cat/{cat_alias?}', ['uses' => 'ArticlesController@index', 'as' => 'articlesCat'])->where('cat_alais', '[\w-]');

Route::resource('motivation', 'MotivationController', [

	"parametrs" => [

		'motivation' => 'alias',

	],
	'names'=>['index'=>'motivation']

]);

Route::resource('success', 'SuccessController', [

	"parametrs" => [

		'success' => 'alias',

	],
	'names'=>['index'=>'success']

]);

Route::resource('aphorisms', 'AphorismsController', [

	"parametrs" => [

		'saphorisms' => 'alias',

	],
	'names'=>['index'=>'aphorism']

]);

Route::resource('gallery', 'GalleryController', [
	'names'=>['index'=>'gallery']

]);

Route::resource('about', 'AboutController', [
	'names'=>['index'=>'about']

]);



Route::get('/search', ['uses' => 'SearchController@getSearch', 'as' => 'search']);
Auth::routes(['register' => false]);
;

});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
     $exitCode1 = Artisan::call('make::auth');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
   
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});





Route::get('login', 'Auth\loginController@showloginForm');

Route::post('login', 'Auth\loginController@login')->name('login');
Route::get('logout', 'Auth\loginController@logout');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

Route::get('/', ['uses'=>'Admin\IndexController@index', 'as'=>'adminIndex']);
Route::resource('adminarticles', 'Admin\ArticlesController');
Route::resource('admingallerys', 'Admin\GalleryController');
Route::resource('adminaphorisms', 'Admin\AphorismController');
Route::resource('adminpoems', 'Admin\PoemsController');
});

Route::group(['middleware' => 'auth'], function(){

Route::get('sub', 'MailChimpController@manageMailChimp');
});
Route::post('subscribe',['as'=>'subscribe','uses'=>'MailChimpController@subscribe']);
Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);

Route::get('/contact', function(){
	return view('Index');
});
Route::post('/contact', function(Request $request){
	Mail::send(new ContactMail($request));
	return redirect('');
	
});
Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost', 'ImageController@resizeImagePost')->name('resizeImagePost');



