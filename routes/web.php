<?php

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/home', 'HomeController@index');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index');

Route::group(['middleware'=>['sess']], function(){

	Route::get('/admin.php', 'AdminController@index')->name('admin.index');
	Route::get('/admin.php/Assign/{id}', 'AdminController@reqButton')->name('admin.reqButton');
	Route::get('/home/view_users.php', 'HomeController@list')->name('home.list')->middleware('sess');
	Route::get('/home/details/{id}', ['as'=>'home.show','uses'=>'HomeController@show']);

	/*Route::group(['middleware'=>['type']], function(){*/
		Route::get('/admin/add.php', 'HomeController@add')->name('home.add')->middleware('sess');
		Route::post('/admin/add.php', 'HomeController@create');
		Route::get('/admin/edit.php/{id}', 'AccountInfoController@edit')->name('home.edit');
		Route::post('/admin/edit.php/{id}', 'AccountInfoController@update');
		Route::get('/admin/delete.php/{id}', 'AdminDeptController@delete')->name('home.delete');
		Route::post('/admin/delete.php/{id}', 'AdminDeptController@destroy');
		Route::get('/admin/area.php', 'AreaController@area')->name('home.add')->middleware('sess');
		Route::post('/admin/area.php', 'AreaController@area');
		Route::get('/admin/Assignworker.php/{id}', 'AssignWorkerController@Assignworker')->name('home.edit');
		Route::post('/admin/customerReq.php/{id}', 'CustomerReqController@customerReq');
		Route::get('/admin/dept.php/{id}', 'DeptController@dept')->name('home.delete');
		Route::post('/admin/dept.php/{id}', 'DeptController@dept');
	/*});*/
});