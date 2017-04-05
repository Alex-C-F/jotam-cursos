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


Route::group(['middleware'=>['web']], function(){

	Route::get('informacoes/{slug}',['as' => 'informacao.single', 'uses' => 'BlogController@getSingle'])
		->where('informacoes','[\w\d\-\_]+');
	Route::get('informacoes',['uses'=>'BlogController@getIndex','as'=>'informacao.index']);
	//categoria
	Route::resource('/categorias','CategoriaController',['except'=>['create']]);
	Route::get('cursos_slug/{slug}',['as' => 'cursos_slug.single', 'uses' => 'Cursos_slugController@getSingle'])
		->where('cursos_slug','[\w\d\-\_]+');
	//faz o filtro de modulos por categoria
	Route::get('cursos-modulos/{nome}',['as' => 'pages.modulos','uses' =>'PagesController@getModulos']);
	//faz a busca da categoria solicitada pelo usuario searchgetSerchPacote
	Route::get('/pacote-search','PagesController@getSearchPacote');
	Route::get('/curso-search','PagesController@getSearchCurso');
	//faz a busca do curso solicitado pelo usuario searchgetSerchCurso

	Route::get('cursos-index',['uses'=>'Cursos_slugController@getIndex','as'=>'cursos_slug.index']);
	Route::get('/fotos', 'PagesController@getGaleria');
	Route::get('/','PagesController@getIndex');
	Route::get('/about', 'PagesController@getAbout');
	Route::get('/contact', 'PagesController@getContact');
	Route::post('/contact','PagesController@postContact');
	Route::post('/contact/desconto','PagesController@postDesconto');
	Route::resource('posts','PostController');
	Route::resource('cursos','CursoController');
	Route::resource('/galerias','GaleriaController',['except'=>['edit','create','update']]);
	Route::resource('/slides','SlidesController', ['only'=>['index','show','destroy','store']]);
	Route::get('/pacotes/cursos','PagesController@getPacotes');
	Route::get('/success-contact', 'PagesController@getSuccess_contact');

    Route::get('notfound',['as'=>'notfound','uses'=>'PagesController@getNotfound']
	);
	//rotas manuais de Auth
	Route::get('login',['as'=>'login','uses'=> 'Auth\LoginController@showLoginForm']
	);

	Route::post('login',['as'=>'login','uses'=> 'Auth\LoginController@login']
	);

	Route::post('password/reset',['as'=>'password.reset','uses'=>'Auth\ResetPasswordController@reset']
	);

	Route::get('password/reset', ['as'=>'password.request','uses'=>'Auth\ResetPasswordController@showLinkRequestForm']);
	
	Route::get('sair',['as'=>'logout','uses'=>'Auth\LoginController@logout']
		);
});

    
