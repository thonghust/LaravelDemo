<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'adminLogin'], function(){
	Route::group(['prefix' => 'theloai', 'as' => 'theloai.'], function(){

		Route::get('hienthi', [
			'as' => 'hienthi',
			'uses' => 'TheLoaiController@hienthi'
		]);

		Route::get('them', [
			'as' => 'getThem',
			'uses' => 'TheLoaiController@getThem'
		]);
		Route::post('them', [
			'as' => 'postThem',
			'uses' => 'TheLoaiController@postThem'
		]);

		Route::get('sua/{id}', [
			'as' => 'getSua',
			'uses' => 'TheLoaiController@getSua'
		]);
		Route::post('sua/{id}',[
			'as' => 'postSua',
			'uses' => 'TheLoaiController@postSua'
		]);

		Route::get('xoa/{id}', [
			'as' => 'getXoa',
			'uses' => 'TheLoaiController@xoa'
		]);
	});
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'adminLogin'], function(){
	Route::group(['prefix' => 'loaitin', 'as' => 'loaitin.'], function(){

		Route::get('hienthi', [
			'as' => 'hienthi',
			'uses' => 'LoaiTinController@hienthi'
		]);

		Route::get('them', [
			'as' => 'getThem',
			'uses' => 'LoaiTinController@getThem'
		]);
		Route::post('them', [
			'as' => 'postThem',
			'uses' => 'LoaiTinController@postThem'
		]);

		Route::get('sua/{id}', [
			'as' => 'getSua',
			'uses' => 'LoaiTinController@getSua'
		]);
		Route::post('sua/{id}', [
			'as' => 'postSua',
			'uses' => 'LoaiTinController@postSua'
		]);

		Route::get('xoa/{id}', [
			'as' => 'getXoa',
			'uses' => 'LoaiTinController@xoa'
		]);
	});
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'adminLogin'], function(){
	Route::group(['prefix' => 'tintuc', 'as' => 'tintuc.'], function(){

		Route::get('hienthi', [
			'as' => 'hienthi',
			'uses' => 'TinTucController@hienthi'
		]);

		Route::get('them', [
			'as' => 'getThem',
			'uses' => 'TinTucController@getThem'
		]);
		Route::post('them', [
			'as' => 'postThem',
			'uses' => 'TinTucController@postThem'
		]);

		Route::get('sua/{id}', [
			'as' => 'getSua',
			'uses' => 'TinTucController@getSua'
		]);
		Route::post('sua/{id}', [
			'as' => 'postSua',
			'uses' => 'TinTucController@postSua'
		]);

		Route::get('xoa/{id}', [
			'as' => 'getXoa',
			'uses' => 'TinTucController@xoa'
		]);
	});
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'adminLogin'], function(){
	Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function(){
		Route::get('loaitin/{id}', [
			'as' => 'getThem',
			'uses' => 'AjaxController@getLoaitin'
		]);
		Route::get('thong', 'AjaxController@thong');
	});
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'adminLogin'], function(){
	Route::group(['prefix' => 'comment', 'as' => 'comment.'], function(){
		Route::get('xoa/{id}/{idTintuc}', [
			'as' => 'getXoa',
			'uses' => 'CommentController@xoa'
		]);
	});
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'adminLogin'], function(){
	Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
		Route::get('hienthi', [
			'as' => 'hienthi',
			'uses' => 'UserController@hienthi'
		]);

		Route::get('them', [
			'as' => 'getThem',
			'uses' => 'UserController@getThem'
		]);
		Route::post('them', [
			'as' => 'postThem',
			'uses' => 'UserController@postThem'
		]);

		Route::get('sua/{id}', [
			'as' => 'getSua',
			'uses' => 'UserController@getSua'
		]);
		Route::post('sua/{id}', [
			'as' => 'postSua',
			'uses' => 'UserController@postSua'
		]);

		Route::get('xoa/{id}', [
			'as' => 'getXoa',
			'uses' => 'UserController@getXoa'
		]);
	});
});

Route::get('admin/dangnhap', [
	'as' => 'getLogin',
	'uses' => 'UserController@getDangnhapAdmin'
]);
Route::post('admin/dangnhap', [
	'as' => 'postLogin',
	'uses' => 'UserController@postDangnhapAdmin'
]);
Route::get('admin/dangky', [
	'as' => 'getRegister',
	'uses' => 'UserController@getDangky'
]);
Route::post('admin/dangky', [
	'as' => 'postRegister',
	'uses' => 'UserController@postDangKy'
]);
Route::get('admin/dangxuat', [
	'as' => 'getLogout',
	'uses' => 'UserController@getDangxuatAdmin'
]);

Route::get('/', [
	'as' => 'Trangchu',
	'uses' => 'PagesController@trangchu'
]);
Route::get('/Home', [
	'as' => 'Trangchu',
	'uses' => 'PagesController@trangchu'
]);
Route::get('/Contact', [
	'as' => 'Lienhe',
	'uses' => 'PagesController@lienhe'
]);
Route::get('/Loaitin/{id}', [
	'as' => 'Loaitin',
	'uses' => 'PagesController@loaitin'
]);
Route::get('/Tintuc/{id}', [
	'as' => 'Tintuc',
	'uses' => 'PagesController@tintuc'
]);
Route::post('/Comment/{id}', [
	'as' => 'postComment',
	'uses' => 'CommentController@comment'
]);
Route::post('/Timkiem', [
	'as' => 'postSearch',
	'uses' => 'PagesController@postTimkiem'
]);