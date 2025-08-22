<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('website.home.index');
    }
    public function singlePost(){
        return view('website.post.index');
    }
}
