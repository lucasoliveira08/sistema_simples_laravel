<?php


Route::group(['middleware' => 'auth', 'namespace' => 'Painel'], function () {

    // início e categorias

    Route::get('painel', 'CategoriaController@index')->name('painel');
    Route::post('painel', 'CategoriaController@guardarCat')->name('guardarCat');
    Route::get('painel/deletar/{id}', 'CategoriaController@deletar')->name('painel.delete');
    Route::get('painel/editar/{id}', 'CategoriaController@editar')->name('painel.edit');
    Route::post('painel/editar/{id}', 'CategoriaController@update')->name('painel.update');

    // produtos

    Route::get('produtos', 'ProdutoController@index')->name('produtos');
    Route::post('produtos', 'ProdutoController@guardarProduto')->name('guardarProduto');
    Route::get('produtos/deletar/{id}', 'ProdutoController@deletar')->name('produto.deletar');


});
Route::get('/', 'Site\SiteController@index')->name('home');


Auth::routes();

