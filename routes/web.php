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

Route::get('/welcome',[
    'uses'=>'HomeController@getWelcome',
    'as'=>'/'
]);

Route::get('/',[
    'uses'=>'HomeController@getWelcome',
    'as'=>'/'
]);

Route::get('/upload/cat/{id}',[
    'uses'=>'HomeController@getProductCategory',
    'as'=>'upload.cat'
]);

Route::get('/show/posts',[
   'uses'=>'TravelController@getAllPost',
    'as'=>'allPost'
]);

Route::get('/location-image/{img_name}', [
    'uses'=>'TravelController@getLocationImage',
    'as'=>'location.image'
]);

Route::get('/post/delete',[
    'uses'=>'TravelController@getDeletePost',
    'as'=>'delete.post'
]);

Route::get('/front-location-image/{img_name}',[
    'uses'=>'HomeController@getLocationImage',
    'as'=>'front.location.image'
]);

Route::get('/view/locationDetail/{id}',[
    'uses'=>'HomeController@getOnePost',
    'as'=>'view.detail.one'
]);

Route::get('/contactus',[
    'uses'=>'HomeController@getContactUs',
    'as'=>'contactUs'
]);

Auth::routes(['verify' => true]);
Route::group(['middleware'=>'verified'],function(){

    Route::get('/home', 'HomeController@index')->name('home');

Route::get('/postUpload',[
    "uses"=>"TravelController@getPostUpload",
    "as"=>'postUpload'
]);

Route::post('/newCategory',[
    'uses'=>'TravelController@postNewCategory',
    'as'=>'new.category'
]);

Route::post('/newUploadDetail',[
    'uses'=>'TravelController@postNewUploadDetail',
    'as'=>'new.uploadDetail'
]);

Route::post('/update/Category/',[
    'uses'=>'TravelController@postUpdateCategory',
    'as'=>'update.category'
]);

Route::get('/delete/Category/{id}',[
        'uses'=>'TravelController@getDeleteCategory',
        'as'=>'remove.category'
    ]);

});