<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class HomeController extends Controller
{
    public function index()
    {
        $latestPost = Post::latest()->take(10)->get();
        $categories = Category::all();
        return view('website.home.index', compact('latestPost','categories'));

    }
    public function postShow($category,$slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            abort(404); // or return an error view/message
        }

        // continue with $post

        return view('website.post.index', compact('post'));
    }
    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            abort(404); // or return an error view/message
        }

        // continue with $post

        return view('website.post.index', compact('post'));
    }
    public function singlePostDemo()
    {
        return view('website.post.demo');
    }
    public function categoryPost($category)
    {
      $category = Category::where('slug', $category)->firstOrFail();
$posts = $category->posts()->latest()->get();

        if(!$posts){
            abort(404);
        }
        return view('website.archive.category',compact('posts'));
    }
}
