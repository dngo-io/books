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

Route::get('/', 'HomeController@root_index');
Route::get('/steem', 'HomeController@steem');

Route::get('/road-map', function () {
    return view('road-map');
});
Route::get('/about', 'AboutController@index');


Route::get('/listen', function () {
    return view('listen');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/search', function (\Illuminate\Http\Request $request) {
    /** @var \App\Repositories\BookRepository $bookRepository */
    $bookRepository = EntityManager::getRepository(\App\Entities\Book::class);
    $books = $bookRepository->getSearchResults($request);
    dd($books);
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/feed', function () {
    return view('feed');
});

Route::get('/moderation', function () {
    return view('moderation', [
        'users' => [
            'ikidnapmyself',
            'tubi',
            'maskoze',
            'bencagri'
        ],
        'colors' => [
            'success',
            'dark',
            'danger',
            'warning'
        ]
    ]);
});

Route::get('/login', 'Auth\LoginController@redirectToProvider');
Route::get('/login/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@home');
//Route::get('/books', 'BookController@index');

Route::resource('user','UserController');
Route::resource('book','BookController@index');
Route::resource('category','CategoryController');
Route::resource('audio','AudioController');
// Sitemap for Google
Route::get('sitemap', 'SitemapsController@index');

if (config('app.env') == 'local') {
    Route::get('/login/test', function () {
        $em = app('em');
        $userRepository = $em->getRepository(User::class);

        if ($user = $userRepository->findOneByAccount('dngotester')) {
            Auth::login($user);
            redirect('/');
        }else{
            echo 'run <b> php artisan dngo:create:testuser</b> first';
        }

    });
}