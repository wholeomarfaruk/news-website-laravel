<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postList()
    {
        // Logic to retrieve and return the list of posts

        return view('admin.post-list');
    }

    public function createPostForm()
    {
        // Logic to show the form for creating a new post
        return view('admin.post-create');
    }

    public function createPost(Request $request)
    {
        // Logic to handle the creation of a new post
        // Validate and save the post data
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->back()->with('error','Post not found');
        }
        // Logic to show the form for editing an existing post
        return view('admin.post-edit', compact('id'));
    }

    public function updatePost(Request $request, $id)
    {
        // Logic to handle updating an existing post
        // Validate and update the post data
    }

    public function deletePost($id)
    {
        // Logic to handle deleting a post
    }
}
