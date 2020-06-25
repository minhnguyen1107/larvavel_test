<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

Route::get('/', function () {
    return view('welcome');
});
//Truyền tham số cho route
Route::get('laravel/{ten}', function ($ten) {
    echo "Tên bạn là" .$ten;
})->where(['ten'=>'[a-zA-Z]+']);
//đặt điều kiện cho tham số với phương thức where
//bắt lỗi bằng regular expression

//Định danh cho route
Route::get('route1', ['as'=>'Myroute', function() {
    echo "Xin chào Minh";
}]);

Route::get('route2', function() {
    echo "Đây là route 2";
})->name('Myroute2');

Route::get('GoiTen', function () {
    return redirect()->route('Myroute2');
});
 //Group route
 Route::group(['prefix'=>'MyGroup'], function() {
    Route::get('User1', function() {
        echo "User1";
    });
    Route::get('User2', function() {
        echo "User2";
    });
    Route::get('User3', function() {
        echo "User3";
    });
});

//Gọi controller
Route::get('GoiController', 'MyController@XinChao');


Route::get('Thamso/{ten}', 'MyController@KhoaHoc');

//Url
Route::get('MyRequest', 'MyController@GetUrl');

//Gửi nhận tham số trên request
Route::get('getForm', function(){
    return view('postForm');
});
Route::post('postForm', ['as'=>'postForm', 'uses'=>'MyController@postForm']);
//Cookie

Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

//uploadfile
Route::get('uploadFile', function(){
    return view('postFile');
});
Route::post('postFile', 'MyController@postFile')->name('postFile');

Route::get('getJson', 'MyController@getJson');

Route::get('myView', 'MyController@myView');

//Truyền tham số trên view
Route::get('Time/{t}', 'MyController@Time');

View::share('Khoahoc', 'Laravel');

//blade temple
Route::get('blade',function(){
    return view('pages.laravel');
});

Route::get('BladeTemplate/{str}', 'MyController@blade');

Route::get('database', function () {
    // Schema::create('loaisanpham', function($table) {
    //     $table->increments('id');
    //     $table->string('ten',200);


    // });
    Schema::create('theloai', function($table) {
        $table->increments('id');
        $table->string('ten',200)->nullable();
        $table->string('nsx')->default('Nhan san xuat');


    });
    echo "Đã thực hiện lệnh tạo bảng";
    
});
//liên kết bảng
Route::get('lienketbang',function(){
    
    Schema::create('sanpham', function ($table) {
        $table->increments('id');
        $table->string('ten');
        $table->float('gia');
        $table->integer('soluong')->default(0);
        $table->integer('id_loaisanpham')->unsigned();
        $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
        //
    });
    echo "Đã liên kết bảng";
    

});
//Sửa bảng
Route::get('suabang', function(){
    
    Schema::table('theloai', function ($table) {
        //xóa cột
        $table->dropColumn('nsx');
    });
    echo "Đã xóa cột";
    

});
//Thêm cột
Route::get('themcot', function(){
    
    Schema::table('theloai', function($table) {
        $table->string('Email');

    });
    echo "Đã thêm cột";

    
});
//Đổi tên cột
Route::get('doiten', function(){
    
    Schema::rename('theloai', 'nguoidung');
    echo "Đã đổi tên bảng";
    

});
//Xóa bảng
Route::get('xoabang', function(){
    // Schema::drop('nguoidung');
    // echo "Đã xóa bảng";
    
    Schema::dropIfExists('nguoidung');
    echo "Đã xóa nếu có bảng";
});
Route::get('taobang', function(){
    Schema::create('theloai', function($table) {
        $table->increments('id');
        $table->string('ten',200)->nullable();
        $table->string('nsx')->default('Nhan san xuat');


    });
    echo "Đã thực hiện lệnh tạo bảng";

});

