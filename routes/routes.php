<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Entities\User;

Route::middleware(['moderator'])->prefix('moderation')->group(function () {
    Route::get('/', 'Staff\ModeratorController@index');
    Route::get('/logs', 'Staff\ModeratorController@steemLogs');
    Route::get('/audio/{id}', 'Staff\ModeratorController@modal');
    Route::post('/action/{id}/{status}', 'Staff\ModeratorController@action');
});


Route::get('users','UserController@user_list');
Route::resource('user','UserController');
Route::prefix('user')->group(function () {
    Route::get('/{id}/following', 'UserController@following');
    Route::get('/{id}/followers', 'UserController@followers');
    Route::get('/{id}/pending-approval', 'UserController@pendingApproval');
    Route::get('/{id}/rejected', 'UserController@rejected');
});






Route::prefix('listen')->group(function () {
    Route::get('/{id}', 'ListenController@index');
    Route::get('/embed/{id}', 'ListenController@embed');
});

Route::get('/', 'HomeController@root_index');
Route::get('/rules', 'RulesController@index');
Route::get('/road-map', 'RoadMapController@index');
Route::get('/about', 'AboutController@index');

Route::get('/login', 'Auth\LoginController@warning');
Route::get('/login/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/login/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@home');

Route::prefix('feed')->group(function () {
    Route::get('/', 'FeedController@index');
    Route::get('/pending-approval', 'FeedController@pendingApproval');
    Route::get('/rejected', 'FeedController@rejected');
});

Route::get('/books', 'BooksController@index');

Route::get('/image', 'ImageController@crop');

/** Actions */
Route::prefix('action')->group(function () {
    Route::get('book', 'ActionController@book');
    Route::get('audio-tags', 'ActionController@audioTags');
    Route::get('topbar', 'ActionController@topbar');

    Route::get('upvote/{author}/{permlink}/{weight}', 'ActionController@upvote');

});

Route::resource('category','CategoryController');
Route::resource('audio','AudioController')->middleware(['auth']);
Route::get('audio/image/{id}','AudioController@image');
Route::get('book/image/{id}','BookController@image');
Route::get('book/{id}/{slug}','BookController@show');


/** Api */
Route::prefix('api')->group(function () {
    Route::get('speech', 'Api\SpeechController@index');
});


// Sitemap for Google
Route::get('sitemap', 'SitemapsController@index');

if (config('app.env') == 'local') {
    Route::get('/login/test', function () {
        $em = app('em');
        $userRepository = $em->getRepository(User::class);

        if ($user = $userRepository->findOneByAccount('dngotester')) {
            Auth::login($user);
            return redirect('/books');
        }else{
            echo 'run <b> php artisan dngo:create:testuser</b> first';
        }

    });
}