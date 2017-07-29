<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $username = ["username"=>"budi"];
        return view('guru.index')->with($username);
    }
}
