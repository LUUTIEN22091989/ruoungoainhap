<?php 

Route::group(['prefix' => 'tai-khoan','namespace' => 'User', 'middleware' => 'check_user_login'], function(){
  Route::get('', 'UserController@index')->name('get.user.index');

  Route::get('update-thong-tin', 'UserInfoController@updateInfo')->name('get.user.update_info');
  Route::post('update-thong-tin', 'UserInfoController@saveInfo');

  Route::get('quan-ly-don-hang', 'UserTransactionController@transaction')->name('get.user.transaction');
});








 ?>