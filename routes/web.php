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
Auth::routes();

Route::get('/', function () {
   return view('index');
});

Route::get('/index', function () {
   return view('index');
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function () {
   return view('index');
});

// Geeft nog foutmelding... Gezamenlijk bekijken...
Route::get('spelreserveren', function() {
   return view('spelreserveren');
});
// ------------------------------------------------

Route::get('/vraag', function () {
   return view('includes/vraag');
});

// Route::get('test', function () {
//    return view('test');
// });


Route::group(['middleware' => ['auth']], function() {
   Route::put('/profiel', 'ProfielController@update')->name('profiel.update');  
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('profiel', 'ProfielController@profiel')->name('profiel');

Route::get('/vriendtoevoegen', 'User_RelationController@vrienden')->name('vriendkiezen');

Route::get('keuze', 'KeuzeController@keuze')->name('keuze');

Route::get('keuzevrienduitnodiging', 'KeuzeController@keuzevrienduitnodiging')->name('keuzevrienduitnodiging');

Route::get('vriendbevestigen/{gebruiker_id}/{vriend_id}', 'User_RelationController@vriendToevoegenMail')->name('vriendbevestigen');

Route::get('spelkeuze', 'SpelController@spelkeuze')->name('spelkeuze');

Route::get('spel', 'SpelController@spel')->name('spel');

Route::get('spel/{id}', 'SpelController@spel')->name('spel');

Route::get('spelaccepteren', 'ActievespelController@actiefspelaccepteren')->name('actiefspelaccepteren');

Route::get('spelaccepteren/{id}', 'ActievespelController@actiefspelaccepteren')->name('actiefspelaccepteren');



Route::post('spelkeuze', 'ActievespelController@actiefspeltoevoegen')->name('actiefspeltoevoegen');

Route::post('spel/{id}/{uitgenodigde}', 'SpelController@spelSpelen')->name('spelSpelen');

Route::post('profiel/{id}', 'SpelController@spel');

Route::post('chat/{vriend}', 'KeuzeController@naarChat')->name('naarChat');

Route::post('vriendentoevoegen', 'MailController@mailvriendtoevoegen')->name('vriendtoevoegen');

Route::post('NieuwSpeler', 'MailController@nieuwspelertoevoegen')->name('nieuwspelertoevoegen');




