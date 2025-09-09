<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;
use function Livewire\Volt\js;

class HomeController extends Controller
{
    public function index()
    {
        $latestPost = Post::latest()->take(10)->get();
        $categories = Category::all();
        $featuredPost = Post::where('is_featured', true)
            ->where('status', 'published')->latest()->first();
        return view('website.home.index', compact('latestPost', 'categories', 'featuredPost'));

    }
    public function postShow($category, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            abort(404);
        }

        $post->increment('views'); // +1 each visit
        $relatedPosts = Post::where('category_id', $post->category_id) // same category
            ->where('id', '!=', $post->id)           // exclude current post
            ->latest()                               // order by created_at desc
            ->take(5)                                // take 5 posts
            ->get();
        // continue with $post
        $recentPosts = Post::latest()  // order by created_at DESC
            ->take(10)   // take only 5
            ->get();
        // continue with $post

        return view('website.post.index', compact('post', 'relatedPosts', 'recentPosts'));
    }
    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            abort(404); // or return an error view/message
        }
        // Assuming current post is $post
        $relatedPosts = Post::where('category_id', $post->category_id) // same category
            ->where('id', '!=', $post->id)           // exclude current post
            ->latest()                               // order by created_at desc
            ->take(5)                                // take 5 posts
            ->get();
        // continue with $post
        $recentPosts = Post::latest()  // order by created_at DESC
            ->take(10)   // take only 5
            ->get();
        return view('website.post.index', compact('post', 'relatedPosts'));
    }
    public function singlePostDemo()
    {
        return view('website.post.demo');
    }
    public function categoryPost($category)
    {
        $category = Category::where('slug', $category)->firstOrFail();
        $posts = $category->posts()->latest()->get();
        $category_id = $category->id;



        return view('website.archive.category', compact('posts', 'category_id'));
    }
    public function recentPosts()
    {

        return view('website.archive.recent-posts');
    }
    public function uploadByFile(Request $request)
    {
        // return  response()->json(['success' => true,'file'=>$request->file('image')]);
        $file = $request->file('image');
        $file->move( public_path('media'), $file->getClientOriginalName());
        return response()->json(['success' => true,'file'=>['url'=>asset('media/'.$file->getClientOriginalName())]]);
    }
    public function uploadByUrl(Request $request)
    {
        $url = $request->input('url');
        $filename = basename($url);
        $contents = file_get_contents($url);
        file_put_contents(public_path('media/'.$filename), $contents);
        return response()->json(['success' => true,'file'=>['url'=>asset('media/'.$filename)]]);
    }
}
