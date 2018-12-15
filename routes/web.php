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

// Front-end Route ..............

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',['as'=>'trang-chu','uses'=>'PageController@getIndex']);

Route::get('loai-san-pham/{id_cate}',['as'=>'loaisanpham','uses'=>'PageController@getLoaiSp']);

Route::get('chi-tiet-san-pham/{id}',['as'=>'chitietsanpham','uses'=>'PageController@getChitiet']);

Route::get('lien-he',['as'=>'lienhe','uses'=>'PageController@getLienHe']);

Route::get('gioi-thieu',['as'=>'gioithieu','uses'=>'PageController@getGioiThieu']);

Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'PageController@getAddtoCart']);

Route::get('dell-cart/{id}',['as'=>'xoagiohang','uses'=>'PageController@getDelItemCart']);

Route::get('dat-hang',['as'=>'dathang','uses'=>'PageController@getCheckout']);

Route::post('dat-hang',['as'=>'dathang','uses'=>'PageController@postCheckout']);

Route::get('dang-nhap',['as'=>'login','uses'=>'PageController@getLogin']);

Route::post('dang-nhap',['as'=>'login','uses'=>'PageController@postLogin']);

ROute::get('dang-xuat',['as'=>'logout','uses'=>'PageController@getLogout']);

Route::post('dang-ki',['as'=>'signup','uses'=>'PageController@postSignup']);

Route::get('dang-ki',['as'=>'signup','uses'=>'PageController@getSignup']);

Route::get('tim-kiem',['as'=>'timkiem','uses'=>'PageController@getSearch']);

/* --------------------------------------------------------------------------------------------------------------------- */
// Back-end Route ................

Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
    Route::group(['prefix'=>'brand'], function(){
        // admin/brand/danhsach
        Route::get('/danhsach','BrandController@getDanhSach')->middleware('can:employee');

        Route::get('/sua/{id}','BrandController@getSua')->middleware('can:employee');
        Route::post('/sua/{id}','BrandController@postSua')->middleware('can:employee');

        Route::get('/them','BrandController@getThem')->middleware('can:employee');
        Route::post('/them','BrandController@postThem')->middleware('can:employee');

        Route::get('/xoa/{id}','BrandController@getXoa')->middleware('can:employee');

        Route::get('/unactive/{id}', 'BrandController@unactive')->middleware('can:employee');
        Route::get('/active/{id}', 'BrandController@active')->middleware('can:employee');
    });

    Route::group(['prefix'=>'category'], function(){
        // admin/category/danhsach
        Route::get('/danhsach','CategoryController@getDanhSach')->middleware('can:employee');

        Route::get('/sua/{id}','CategoryController@getSua')->middleware('can:employee');
        Route::post('/sua/{id}','CategoryController@postSua')->middleware('can:employee');

        Route::get('/them','CategoryController@getThem')->middleware('can:employee');
        Route::post('/them','CategoryController@postThem')->middleware('can:employee');

        Route::get('/xoa/{id}','CategoryController@getXoa')->middleware('can:employee');

        Route::get('/unactive/{id}', 'CategoryController@unactive')->middleware('can:employee');
        Route::get('/active/{id}', 'CategoryController@active')->middleware('can:employee');
        
    });

    Route::group(['prefix'=>'product'], function(){
        // admin/product/danhsach
        Route::get('/danhsach','ProductController@getDanhSach')->middleware('can:employee');

        Route::get('/sua/{id}','ProductController@getSua')->middleware('can:employee');
        Route::post('/sua/{id}','ProductController@postSua')->middleware('can:employee');

        Route::get('/them','ProductController@getThem')->middleware('can:employee');
        Route::post('/them','ProductController@postThem')->middleware('can:employee');

        Route::get('/xoa/{id}','ProductController@getXoa')->middleware('can:employee');

        Route::get('/unactive/{id}', 'ProductController@unactive')->middleware('can:employee');
        Route::get('/active/{id}', 'ProductController@active')->middleware('can:employee');
    });

    Route::group(['prefix'=>'order'], function(){
        // admin/product/danhsach
        Route::get('/danhsach','ProductController@getDanhSach')->middleware('can:employee');

        Route::get('/xoa/{id}','ProductController@getXoa')->middleware('can:employee');

        Route::get('/unactive/{id}', 'ProductController@unactive')->middleware('can:employee');
        Route::get('/active/{id}', 'ProductController@active')->middleware('can:employee');
    });

    Route::group(['prefix'=>'slide'], function(){
        // admin/brand/danhsach
        Route::get('/danhsach','SlideController@getDanhSach')->middleware('can:employee');

        Route::get('/sua/{id}','SlideController@getSua')->middleware('can:employee');
        Route::post('/sua/{id}','SlideController@postSua')->middleware('can:employee');

        Route::get('/them','SlideController@getThem')->middleware('can:employee');
        Route::post('/them','SlideController@postThem')->middleware('can:employee');

        Route::get('/xoa/{id}','SlideController@getXoa')->middleware('can:employee');

        Route::get('/unactive/{id}', 'SlideController@unactive')->middleware('can:employee');
        Route::get('/active/{id}', 'SlideController@active')->middleware('can:employee');
    });

    Route::group(['prefix'=>'user'], function(){
        // admin/brand/danhsach
        Route::get('/danhsach','UserController@getDanhSach')->middleware('can:admin');

        Route::get('/sua/{id}','UserController@getSua')->middleware('can:admin');
        Route::post('/sua/{id}','UserController@postSua')->middleware('can:admin');

        Route::get('/them','UserController@getThem')->middleware('can:admin');
        Route::post('/them','UserController@postThem')->middleware('can:admin');

        Route::get('/xoa/{id}','UserController@getXoa')->middleware('can:admin');

        Route::get('/unactive/{id}', 'UserController@unactive')->middleware('can:admin');
        Route::get('/active/{id}', 'UserController@active')->middleware('can:admin');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('brand/{id_category}','AjaxController@getBrand');
    });
});