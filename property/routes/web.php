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

  Route::get('front/home', 'front\\home@index');
  Route::post('front/searchaboutproperty', 'front\\home@searchproperty')->name('search.property');
  Route::get('front/sortedby/{flag}/{allinfo}', 'front\\home@sortedby')->name('sortedby');


Auth::routes();
Route::group(['middleware'=>['auth']],function()
{
  Route::resource('test','TestController');
  Route::resource('users','UserController');
  Route::resource('country','CountryController');
  Route::resource('state','StateController');
  Route::resource('city','CityController');
  Route::resource('region','RegionController');
  Route::resource('clients','ClientController');
  Route::resource('dashboard','DashboardController');
  Route::resource('page','PageController');
  Route::resource('ads','AdController');
  //property type
  Route::resource('type','TypeController');
  //fature
  Route::resource('feature','FeatureController');
  //property
  Route::resource('property','PropertyController');

  Route::get('userActivate/{id}/{active}','UserController@activate')->name('users.activate');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/allUsers', 'UserController@allUsers')->name('allUsers');
Route::get('/deleteImage', 'PropertyController@deleteImage');
Route::get('/propertyRecommend/{id}/{state}', 'PropertyController@recommend')->name('property.recommend');
