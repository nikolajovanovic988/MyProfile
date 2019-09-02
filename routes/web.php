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

/*
Route::get('/', function () {
    return view('home.profiles-home');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/{user}', 'HomeController@show')->name('home.show');


// PROFILE
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

//CONTACT
Route::get('/profile/{user}/contact', 'ProfileContactController@index')->name('contact.show');
Route::get('/profile/{user}/contact/edit', 'ProfileContactController@edit')->name('contact.edit');
Route::patch('/profile/{user}/contact', 'ProfileContactController@update')->name('contact.update');

//EDUCATION
Route::get('/profile/{user}/education', 'ProfileEducationController@index')->name('education.show');
Route::get('/profile/{user}/education/create', 'ProfileEducationController@create')->name('education.create');
Route::post('/profile/{user}/education', 'ProfileEducationController@store')->name('education.store');
Route::get('/profile/{user}/education/edit/{education}', 'ProfileEducationController@edit')->name('education.edit');
Route::patch('/profile/{user}/education/{education}', 'ProfileEducationController@update')->name('education.update');
Route::delete('/profile/{user}/education/delete/{education}', 'ProfileEducationController@destroy')->name('education.destroy');

//PROJECTS
Route::get('/profile/{user}/projects', 'ProfileProjectsController@index')->name('projects.show');
Route::get('/profile/{user}/projects/create', 'ProfileProjectsController@create')->name('projects.create');
Route::post('/profile/{user}/projects', 'ProfileProjectsController@store')->name('projects.store');
Route::get('/profile/{user}/projects/edit/{project}', 'ProfileProjectsController@edit')->name('projects.edit');
Route::patch('/profile/{user}/projects/{project}', 'ProfileProjectsController@update')->name('projects.update');
Route::delete('/profile/{user}/projects/delete/{project}', 'ProfileProjectsController@destroy')->name('projects.destroy');

// TODO
Route::get('/profile/{user}/todo', 'ProfileTodoController@index')->name('todo.show');
Route::post('/profile/{user}/todo/{todo}', 'ProfileTodoController@store')->name('todo.store');
Route::delete('/profile/{user}/todo/delete/{todo}', 'ProfileTodoController@destroy')->name('todo.destroy');
Route::get('/profile/{user}/todo/get', 'ProfileTodoController@get')->name('todo.get');
Route::patch('/profile/{user}/todo/{todo}/{value}', 'ProfileTodoController@update')->name('todo.update');

// PHONEBOOK
Route::get('/profile/{user}/phonebook', 'ProfilePhonebookController@index')->name('phonebook.show');
Route::post('/profile/{user}/phonebook', 'ProfilePhonebookController@store')->name('phonebook.store');
Route::get('/profile/{user}/phonebook/get', 'ProfilePhonebookController@get')->name('phonebook.get');
Route::delete('/profile/{user}/phonebook/delete/{phonebook}', 'ProfilePhonebookController@destroy')->name('phonebook.destroy');
Route::patch('/profile/{user}/phonebook', 'ProfilePhonebookController@update')->name('phonebook.update');
