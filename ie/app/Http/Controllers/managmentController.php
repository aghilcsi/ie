<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class managmentController extends Controller
{
    public function index (){
        return view('management.index');
    }
}
