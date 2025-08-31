<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalVisit=Post::sum('views');
        return view('admin.dashboard',compact('totalVisit'));
    }
}
