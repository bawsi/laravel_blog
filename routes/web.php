<?php

// Page routes
Route::get('/', 'PagesController@index')->name('pages.home');

// public posts routes
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

// public category routes
Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');

// Routes under manage prefix (administration only)
Route::middleware('auth')->prefix('manage')->group(function() {
	// users routes
	Route::get('/users', 'UsersController@index')->name('users.index');
	Route::post('/users', 'UsersController@store')->name('users.store');
	Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
	Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

	// user roles routes
	Route::get('/roles', 'RolesController@index')->name('roles.index');
	Route::post('/roles', 'RolesController@store')->name('roles.store');
	Route::patch('/roles/{role}', 'RolesController@update')->name('roles.update');
	Route::delete('/roles/{role}', 'RolesController@destroy')->name('roles.destroy');

	// posts routes
	Route::get('/posts/create', 'PostsController@create')->name('posts.create');
	Route::get('/posts', 'PostsController@index')->name('posts.index');
	Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update');
	Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
	Route::post('/posts', 'PostsController@store')->name('posts.store');
	Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destroy');

	// Category routes
	Route::get('/categories', 'CategoriesController@index')->name('categories.index');
	Route::delete('/categories/{category}', 'CategoriesController@destroy')->name('categories.destroy');
	Route::patch('/categories/{category}', 'CategoriesController@update')->name('categories.update');
	Route::post('/categories', 'CategoriesController@store')->name('categories.store');

	// Other manage routes
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::get('/', 'ManageController@index');
});

// Auth routes
Route::group([], function() {
	Route::get('/login', 'AuthController@showLogin')->name('auth.showLogin');
	Route::post('/login', 'AuthController@login')->name('auth.login');
	Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});



