<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class HomeController extends Controller
{
    public function index(){
        $latestPost = Post::latest()->take(10);
        return view('website.home.index',compact('latestPost'));
    }
    public function singlePost($slug){
        $post = Post::where('slug', $slug)->first();

if (!$post) {
    abort(404); // or return an error view/message
}

// continue with $post

        return view('website.post.index',compact('post'));
    }
    public function singlePostDemo(){
        return view('website.post.demo');
    }
    public function category(){
        return view('website.archive.category');
    }
}
