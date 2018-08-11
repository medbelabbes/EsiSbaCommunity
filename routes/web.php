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
    return view('welcome');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/profile')->group(function() {
    Route::get('/parametres', 'UserController@edit');
    Route::get('/{user}', 'UserController@show');
    Route::post('/update', 'UserController@update');
    Route::get('{user}/supprimer', 'UserController@supprimer');
    Route::post('/update_img', 'UserController@update_img');
    Route::post('/update_mdp', 'UserController@update_mdp');
    Route::post('/mail/send', 'InvitationmailsController@send');



    Route::prefix('/{user}/groupes')->group(function() {
        Route::get('/', 'GroupesController@index');
        Route::post('/store', 'GroupesController@store');
    });

    Route::prefix('/{user}/blog')->group(function() {
        Route::get('/', 'ArticlesController@index');
        Route::get('/{article}', 'ArticlesController@show');
        Route::post('/store', 'ArticlesController@store');
        Route::post('/update', 'ArticlesController@update');
        Route::post('/{article}/comment', 'CommentsController@store');
        Route::delete('/{article}/destroy', 'ArticlesController@destroy');

    });

    Route::prefix('/{user}/publications')->group(function() {
        Route::get('/', 'PostsController@index');
        Route::get('/{publication}', 'PostsController@show');
        Route::post('/store', 'PostsController@store');
        Route::post('/update', 'PostsController@update');
        Route::post('/{publication}/comment', 'CommentsController@store');

        Route::delete('/{publication}/destroy', 'PostsController@destroy');


    });

});

Route::resource('/profile/invitationmail','InvitationmailsController');
Route::delete('/{comment}/destroy', 'CommentsController@destroy');






//Notre Route
Route::get('/invitations',"BlogController@invitation" );
//Route::get('/',"BlogController@invitation" );

Route::resource('invitation',"InvitationController");
Route::resource('notification',"NotificationController");


Route::resource('amie','AmieController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('markAsRead',function (){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');
//fin



Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@show')->name('conversations.show');
Route::post('/conversations/{user}', 'ConversationsController@store');





