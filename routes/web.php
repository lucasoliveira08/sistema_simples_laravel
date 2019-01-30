<?php


Route::group(['middleware' => 'auth', 'namespace' => 'Painel'], function () {
    Route::get('painel', 'HomeController@index')->name('painel');
    Route::post('painel', 'HomeController@guardarCat')->name('guardarCat');
    Route::get('painel/deletar/{id}', 'HomeController@deletar')->name('painel.delete');
    Route::get('painel/editar/{id}', 'HomeController@editar')->name('painel.edit');
    Route::post('painel/editar/{id}', 'HomeController@update')->name('painel.update');
});
Route::get('/', 'Site\SiteController@index')->name('home');


Auth::routes();

