<?php 

//--------------> 2 ADMIN ----------------------------------->



// trang login admin
Route::get('admin-login', 'AdminLoginController@getLogin')->name('get.admin.login');
Route::post('admin-login', 'AdminLoginController@postLogin');

Route::get('admin-logout', 'AdminLoginController@getLogout')->name('get.admin.logout');

//quên mật khẩu
Route::get('quen-mat-khau', 'AdminLoginController@adminResetPassword')->name('admin.reset.pass');
Route::post('quen-mat-khau', 'AdminLoginController@adminNewPassword')->name('admin.new.pass');

//file manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'check_admin_login'], function(){
  \UniSharp\LaravelFilemanager\Lfm::routes();
});

//trang chủ admin home
Route::get('/home', 'AdminLoginController@adminHome')->name('get.admin.home');

// Giao diện admin, hiển thị thống kế ra trang admin
Route::get('statistical','AdminStatisticalController@index')->name('admin.statistical');
// user thành viên
Route::group(['prefix' => 'admin-user', 'middleware' => 'check_admin_login'], function(){
    Route::get('', 'AdminUserController@index')->name('admin.user.index');
    Route::get('delete/{id}', 'AdminUserController@delete')->name('admin.user.delete');
  });
//trang người quản trị
Route::group(['prefix' => 'admin', 'middleware' => 'check_admin_login'], function(){
    Route::get('', 'AdminController@index')->name('admin.index');
    Route::get('create', 'AdminController@create')->name('admin.create');
    Route::post('create', 'AdminController@store');
    Route::get('update/{id}', 'AdminController@edit')->name('admin.update');
    Route::post('update/{id}', 'AdminController@update');
    Route::get('delete/{id}', 'AdminController@delete')->name('admin.delete');
    Route::get('active/{id}', 'AdminController@active')->name('admin.active');
});
//trang home
Route::group(['prefix' => 'home-frontend', 'middleware' => 'check_admin_login'], function(){
    Route::get('', 'AdminHomeFrontendController@index')->name('admin.home-frontend.index');
    Route::get('create', 'AdminHomeFrontendController@create')->name('admin.home-frontend.create');
    Route::post('create', 'AdminHomeFrontendController@store');
    Route::get('update/{id}', 'AdminHomeFrontendController@edit')->name('admin.home-frontend.update');
    Route::post('update/{id}', 'AdminHomeFrontendController@update');
    Route::get('delete/{id}', 'AdminHomeFrontendController@delete')->name('admin.home-frontend.delete');
    Route::get('status/{id}', 'AdminHomeFrontendController@status')->name('admin.home-frontend.status');
});
//trang category
Route::group(['prefix' => 'category', 'middleware' => 'check_admin_login'], function(){
	Route::get('', 'AdminCategoryController@index')->name('admin.category.index');
    Route::get('create', 'AdminCategoryController@create')->name('admin.category.create');
    Route::post('create', 'AdminCategoryController@store');
    Route::get('update/{id}', 'AdminCategoryController@edit')->name('admin.category.update');
    Route::post('update/{id}', 'AdminCategoryController@update');
    Route::get('delete/{id}', 'AdminCategoryController@delete')->name('admin.category.delete');
});
//trang brand
Route::group(['prefix' => 'brand', 'middleware' => 'check_admin_login'], function(){
	Route::get('', 'AdminBrandController@index')->name('admin.brand.index');
    Route::get('create', 'AdminBrandController@create')->name('admin.brand.create');
    Route::post('create', 'AdminBrandController@store');
    Route::get('update/{id}', 'AdminBrandController@edit')->name('admin.brand.update');
    Route::post('update/{id}', 'AdminBrandController@update');
    Route::get('delete/{id}', 'AdminBrandController@delete')->name('admin.brand.delete');
});
// trang sản phẩm
Route::group(['prefix' => 'product', 'middleware' => 'check_admin_login'], function(){
    Route::get('', 'AdminProductController@index')->name('admin.product.index');
    Route::get('create', 'AdminProductController@create')->name('admin.product.create');
    Route::post('create', 'AdminProductController@store');
    Route::get('update/{id}', 'AdminProductController@edit')->name('admin.product.update');
    Route::post('update/{id}', 'AdminProductController@update');
    Route::get('delete/{id}', 'AdminProductController@delete')->name('admin.product.delete');
    Route::get('status/{id}', 'AdminProductController@status')->name('admin.product.status');
    Route::get('hot/{id}', 'AdminProductController@hot')->name('admin.product.hot');
    //xóa ảnh trong album
    Route::get('delete-image/{id}', 'AdminProductController@deleteImageAlbum')->name('admin.product.delete_image');
    //xuất dữ liệu từ database
    Route::post('export', 'AdminProductController@postExportProduct')->name('admin.export.product');
});
// trang xuất xứ
Route::group(['prefix' => 'country', 'middleware' => 'check_admin_login'], function(){
    Route::get('', 'AdminCountryController@index')->name('admin.country.index');
    Route::get('create', 'AdminCountryController@create')->name('admin.country.create');
    Route::post('create', 'AdminCountryController@store');
    Route::get('update/{id}', 'AdminCountryController@edit')->name('admin.country.update');
    Route::post('update/{id}', 'AdminCountryController@update');
    Route::get('delete/{id}', 'AdminCountryController@delete')->name('admin.country.delete');
    Route::get('status/{id}', 'AdminCountryController@status')->name('admin.country.status');
    Route::get('hot/{id}', 'AdminCountryController@hot')->name('admin.country.hot');
});

// trang đơn hàng
Route::group(['prefix' => 'transaction', 'middleware' => 'check_admin_login'], function(){
    Route::get('', 'AdminTransactionController@index')->name('admin.transaction.index');
    Route::get('delete/{id}', 'AdminTransactionController@delete')->name('admin.transaction.delete');
    //xử lý action đơn hàng tiếp nhận hay đã bàn giao
    Route::get('action/{action}/{id}', 'AdminTransactionController@getAction')->name('admin.action.transaction');
    //show đơn hàng chỗ nut view
    Route::get('view-transaction/{id}', 'AdminTransactionController@getTransactionShow')->name('admin.transaction.show');
    //xóa chi tiết đơn hàng trong từng đơn hàng khi show
    Route::get('order-delete/{id}', 'AdminTransactionController@deleteOrderItem')->name('admin.transaction.delete.order_item');
    // in đơn hàng PDF
    Route::get('in-don-hang/{id}', 'AdminTransactionController@printTransaction')->name('admin.print.transaction');
    //xuất dữ liệu từ database ra êxcel
    Route::post('exportTransaction', 'AdminTransactionController@postExportTransaction')->name('admin.export.transaction');
});

// trang cuppon
Route::group(['prefix' => 'cuppon', 'middleware' => 'check_admin_login'], function(){
    Route::get('', 'AdminCupponController@index')->name('admin.cuppon.index');
    Route::get('create', 'AdminCupponController@create')->name('admin.cuppon.create');
    Route::post('create', 'AdminCupponController@store');
    Route::get('delete/{id}', 'AdminCupponController@delete')->name('admin.cuppon.delete');;
});

   // menu
  Route::group(['prefix' => 'menu'], function(){
    Route::get('', 'AdminMenuController@index')->name('admin.menu.index');
    Route::get('create', 'AdminMenuController@create')->name('admin.menu.create');
    Route::post('create', 'AdminMenuController@store');
    Route::get('update/{id}', 'AdminMenuController@edit')->name('admin.menu.update');
    Route::post('update/{id}', 'AdminMenuController@update');
    Route::get('delete/{id}', 'AdminMenuController@delete')->name('admin.menu.delete');
    Route::get('active/{id}', 'AdminMenuController@active')->name('admin.menu.active');
    Route::get('hot/{id}', 'AdminMenuController@hot')->name('admin.menu.hot');
  });

      // article
  Route::group(['prefix' => 'article'], function(){
    Route::get('', 'AdminArticleController@index')->name('admin.article.index');
    Route::get('create', 'AdminArticleController@create')->name('admin.article.create');
    Route::post('create', 'AdminArticleController@store');
    Route::get('update/{id}', 'AdminArticleController@edit')->name('admin.article.update');
    Route::post('update/{id}', 'AdminArticleController@update');
    Route::get('delete/{id}', 'AdminArticleController@delete')->name('admin.article.delete');
    Route::get('active/{id}', 'AdminArticleController@active')->name('admin.article.active');
    Route::get('hot/{id}', 'AdminArticleController@hot')->name('admin.article.hot');
  });

     // xử lý admin cho slide
Route::group(['prefix' => 'slide'], function(){
        Route::get('', 'AdminSlideController@index')->name('admin.slide.index');
         Route::get('create', 'AdminSlideController@create')->name('admin.slide.create');
        Route::post('create', 'AdminSlideController@store');
        Route::get('update/{id}', 'AdminSlideController@edit')->name('admin.slide.update');
        Route::post('update/{id}', 'AdminSlideController@update');
        Route::get('delete/{id}', 'AdminSlideController@delete')->name('admin.slide.delete');
        Route::get('active/{id}', 'AdminSlideController@active')->name('admin.slide.active');
    });

// xử lý admin cho liên hệ
 Route::group(['prefix' => 'contact'], function () {
    Route::get('', 'AdminContactController@index')->name('admin.contact.index');
    Route::get('delete/{id}', 'AdminContactController@delete')->name('admin.contact.delete');
    Route::get('active/{id}', 'AdminContactController@active')->name('admin.contact.active');
    Route::get('active/{id}', 'AdminContactController@active')->name('admin.contact.active');

     });

   // xử lý admin cho static
Route::group(['prefix' => 'static'], function (){
    Route::get('', 'AdminStaticController@index')->name('admin.static.index');
    Route::get('create', 'AdminStaticController@create')->name('admin.static.create'); // 
    Route::post('create', 'AdminStaticController@store');  //lưu dữ liệu
    Route::get('update/{id}', 'AdminStaticController@edit')->name('admin.static.update');
    Route::post('update/{id}', 'AdminStaticController@update');
    Route::get('delete/{id}', 'AdminStaticController@delete')->name('admin.static.delete');
    Route::get('active/{id}', 'AdminStaticController@active')->name('admin.static.active');

     }); 

   // xử lý admin cho rating
Route::group(['prefix' => 'rating'], function(){
        Route::get('', 'AdminRatingController@index')->name('admin.rating.index');
        Route::get('delete/{id}', 'AdminRatingController@delete')->name('admin.rating.delete');
        Route::get('active/{id}', 'AdminRatingController@active')->name('admin.rating.active');
    });
