<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//class hello
class HelloWorldController extends Controller
{

    public function GetHello(){
        $myArray = array("group1"=>array("nama"=>"erick","alamat"=>"Gowongan Inn"),
        "group2"=>array("nama"=>"bambang","alamat"=>"Jogja"));
        //$data = ["nama"=>"Erick","alamat"=>"Gowongan Inn"];
        return view('helloworld')->with($myArray);
    }

    public function GetHello2($nama){
        return view('helloworld')->with('nama',$nama);
    }


    public function myAdmin(Request $request){
        return "Nama anda :".$request->nama." alamat:".$request->alamat;
    }
}
