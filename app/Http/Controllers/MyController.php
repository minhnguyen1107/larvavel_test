<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    //
    public function XinChao() {
        echo "Chào các bạn";
    }
    public function KhoaHoc($ten) {
       echo "Tên bạn là" .$ten;
       return redirect()->route('Myroute');
    }
    public function GetUrl(Request $request) {
        // Lấy tên đường dẫn
        // return $request->path();

        //Kiểm tra phương thức
        // if($request->isMethod('post'))
        // echo "Phương thức post";
        // else
        // echo "Phương thức get";

        //Kiểm tra chuỗi chứa /My hay ko
        if($request->is('My*'))
        echo "Có My";
        else
        echo "không có My";

    }
    public function postForm(Request $request) {
        echo "tên của bạn là: ";
        echo $request->HoTen;

        if($request->has('tuoi'))
        echo  "Có tham số tuoi";
        else
        echo "K có tham số tuoi";

    }
    public function setcookie() {
        $response = new Response();
        $response->withCookie('Test', 'Laravel',0.1);
        echo "đã setcookie";
        return $response;

    }
    public function getcookie(Request $request) {
        echo "Cookie của bạn là";
        return $request->cookie('Test');

    }
    //upload file ảnh
    public function postFile(Request $request) {
        if($request->hasFile('myFile')) {
            // echo "Đã có file";
            $file = $request->file('myFile');
            if($file->getClientOriginalExtension('myFile') == 'JPG') {
                $filename = $file->getClientOriginalName('myFile');
                echo $filename;
                $file->move('img',$filename);
                echo "Đã upload thành công" .$filename;

            } else {
                echo "K dc phép upload file k phải ảnh";
            }
         
        }
        else {
            echo "Chưa có file";
        };

    }
    public function getJson() {
        $array = ['Test'=>'PHP'];
        return response()->json($array);
    }
    public function myView() {
        return view('view.minh');
    }
    public function Time($t) {
        return view('myView', ['time'=>$t]);
    }
    public function blade($str) {
        $khoahoc = "Laravel - <b> Minh Nguyen </b>";
        if($str == "laravel")
        return view('pages.laravel', ['khoahoc'=>$khoahoc]);
        elseif ($str == "php")
        return view('pages.php', ['khoahoc'=>$khoahoc]);
         
    }
}
