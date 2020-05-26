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

//-------------> 1 BACKEND ----------------------------->
// đăng ký, đăng nhập thành vien
//đăng ký
Route::get('dang-ky', 'RegisterController@getFormRegister')->name('get.register');
Route::post('dang-ky', 'RegisterController@postRegister')->name('post.register');
//đăng nhập
Route::get('dang-nhap', 'LoginController@getFormLogin')->name('get.login');
Route::post('dang-nhap', 'LoginController@postLogin');
// đăng xuất
Route::get('dang-xuat', 'LoginController@getLogout')->name('get.logout');
//quên mật khẩu
Route::get('mat-khau-moi', 'ResetPasswordController@getResetPassword')->name('get.reset.password');
Route::post('mat-khau-moi', 'ResetPasswordController@saveNewPass')->name('post.new.pass');


//Trang chủ
Route::get('/', 'HomeController@index')->name('get.home');
//Trang tìm kiếm sản phẩm trên thanh search
Route::post('search', 'HomeController@searchProduct')->name('search.product');
//Trang sản phẩm theo danh mục
Route::get('danh-muc/{slug}', 'ProductByCategoryController@getProductByCategory')->name('get.ProductByCategory');
//Trang chi tiết sản phẩm
Route::get('san-pham/{slug}', 'ProductDetailController@getProductDetail')->name('get.ProductDetail');
//Thêm sp vào giỏ hàng
Route::post('them-vao-gio-hang/{id}', 'ShoppingCartController@addShoppingCart')->name('post.ShoppingCart');
// giao diện trang danh sách đơn hàng
Route::get('don-hang', 'ShoppingCartController@index')->name('get.shopping.list');

//xóa sp khỏi đơn hàng
// Route::get('xoa-don-hang/{rowId}','ShoppingCartController@delete')->name('get.shopping.delete');
// //update số lượng bằng Cart
// Route::post('update', 'ShoppingCartController@update')->name('get.shopping.update-qty');
// // 

// xóa sp khỏi đơn hàng bằng ajax
Route::get('delete/{id}', 'ShoppingCartController@delete')->name('ajax.shopping.delete');
// update số lượng bằng ajax
Route::get('update/{id}', 'ShoppingCartController@update')->name('ajax.update.qty');
// thanh toán
Route::post('thanh-toan', 'ShoppingCartController@postPay')->name('post.shopping.pay');

// nhập mã giảm giá
Route::post('check-cuppon', 'ShoppingCartController@checkCuppon')->name('post.check.cuppon');
// xóa mã khi ko dùng nưa
Route::get('delete-cuppon', 'ShoppingCartController@deleteCuppon')->name('get.delete.cuppon');
 // show toàn bộ tin tức
 Route::get('tin-tuc', 'NewsController@index')->name('get.news.list');
 // chi tiết bài viết
 Route::get('chi-tiet-bai-viet/{slug}', 'ArticleDetailController@getArticleDetail')->name('get.article.detail');
 //Liên hệ
 Route::get('lien-he','ContactController@index')->name('get.contact');
 Route::post('lien-he','ContactController@store');

 // đánh giá sản phẩm
 Route::post('danh-gia/{id}','RatingController@postRating')->name('post.rating.product');

 // trang giới thiệu chung về công ty
Route::group(['prefix' => 'gioi-thieu'], function(){
	 // trang static
	Route::get('ve-chung-toi', 'PageStaticController@getVeChungToi')->name('get.static.VeChungToi');
	Route::get('chinh-sach-mua-hang-va-thanh-toan', 'PageStaticController@getMuaHang')->name('get.static.MuaHang');
	Route::get('chinh-sach-giao-nhan', 'PageStaticController@getGiaoNhan')->name('get.static.GiaoNhan');
});

include 'route_admin.php';
include 'route_user.php';
