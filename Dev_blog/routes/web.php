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

Auth::routes(['verify' => true]);

//route for home page
Route::get('/home', 'HomeController@index')->name('home');

//route for welcome page
Route::get('/', function () {
    return view('welcome')->with('category',App\Category::all())
                          ->with('tags',App\Tag::all());
})->name('welcome');

//routs for posts
Route::get('/posts/create', "PostsController@create");
Route::post('/posts/store', "PostsController@store");
//Route::get('/home', "PostsController@index");
Route::get('/posts/{id}', 'PostsController@show');
Route::get('/posts/softDeleted', 'PostsController@trashed');
Route::get('/posts/edit/{id}', 'PostsController@edit');
Route::post('/posts/update/{id}','PostsController@update');
Route::get('/posts/delete/{id}', 'PostsController@destroy');
Route::get('/posts/hDelete/{id}', 'PostsController@hDelete');
Route::get('/posts/restore/{id}', 'PostsController@restore');


//routs for categories
Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/edit/{id}', 'CategoryController@edit');
Route::get('/categories/delete/{id}', 'CategoryController@destroy');
Route::get('/categories/index', 'CategoryController@index');
Route::post('/categories/store','CategoryController@store');
Route::post('/categories/update/{id}','CategoryController@update');

//routs for Tags
Route::get('/tags/create', 'TagsController@create')->name('tags.create');
Route::get('/tags/edit/{id}', 'TagsController@edit');
Route::get('/tags/index', 'TagsController@index')->name('tags.index');
Route::post('/tags/store','TagsController@store');
Route::post('/tags/update/{id}','TagsController@update');
Route::get('/tags/delete/{id}', 'TagsController@destroy');
Route::get('/tags/hDelete/{id}', 'TagsController@hDelete');
Route::get('/tags/restore/{id}', 'TagsController@restore');
Route::get('/tags/softDeleted', 'TagsController@trashed');

//routs for users
Route::get('/users/index', 'Auth\RegisterController@index')->name('users.index');
Route::get('/makeadmin/{id}', 'Auth\RegisterController@makeAdmin');
Route::get('/notadmin/{id}', 'Auth\RegisterController@notAdmin');
Route::get('/users/{id}', 'ProfilesController@show');
Route::get('/users/register', function () {
    return view('auth/register');
});

//routs for settings
Route::get('/settings/edit', 'SettingsController@edit');
Route::post('/settings/update', 'SettingsController@update');
Route::get('/settings/index', 'SettingsController@index')->name('settings.index');

//routs for search results
Route::get('/results', function () {
    $post = App\Post::where('slug','like','%'.request('search').'%')->get();
    $categories = App\Category::where('name','like','%'.request('search').'%')->get();
    $Tags = App\Tag::where('name','like','%'.request('search').'%')->get();

    return view('results')->with('posts',$post)
                          ->with('categories',$categories)
                          ->with('tags',$Tags)
                          ->with('query',request('search'));
});

/*test one to many relationship between category and post
 *route for rwturn posts belongs to specific category
 */
Route::get('/categoryPosts/{id}', function ($id) {
    return view('posts/categoryPosts')->with('posts',App\Category::find($id)->posts)
                                      ->with('category',App\Category::find($id))
                                      ->with('users',App\User::all());
});

Auth::routes();
