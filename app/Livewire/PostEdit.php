<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;
    public $createModal = false;
    public $name;
    public $parent_id;
    public $featured_image;
    public $title;
    public $slug;
    public $excerpt;
    public $status = 'draft'; // default status
    public $publish_date;
    public $category_id;
    public $content;
    public $url;
    public $isFeatured = false;
    public $postId;
    public $post;
    public function mount($id)
    {
        $this->postId = $id;
        $post = Post::find($id);
        $this->post = $post;
        $this->title = $post->title;
        $this->category_id = $post->category_id;
        $this->slug = $post->slug;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->url = $this->url = url('/') . "/" . $post->slug;
        $this->isFeatured = $post->is_featured;
        $this->publish_date = $post->updated_at;



    }
    public function generateSlug()
    {

        $this->validate([
            'slug' => 'required|min:3|unique:posts,slug'
        ]);

        $this->slug = Str::slug($this->slug);
        $this->url = url('/') . "/" . $this->slug;
    }
    public function render()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('livewire.post-edit', [
            'categories' => $categories,
        ]);
    }
    public function updatePost()
    {
        // dd($this->category_id);

        $this->validate([
            'title' => "string|min:3",
            "content" => "required"

        ]);
        $post = Post::find($this->postId);
        if (!$post) {
                      $this->dispatch('postUpdateStatus', ['error' => 'Post not found']);

        }
        try {


            $post->update([
                'title' => $this->title,
                'content' => $this->content,
                'slug' => $this->slug,
                'is_featured' => $this->isFeatured,
                'category_id' => $this->category_id,
                'status' => $this->status,
            ]);
            return redirect()->route('admin.post.list')->with('success', 'Post Updated Successfully.');
        } catch (\Throwable $th) {
            $this->dispatch('postUpdateStatus', ['error' => $th->getMessage()]);
        }


    }
        public function createPost()
    {
        // dd($this->category_id);

        $this->validate([
            'title' => "string|min:3",
            "content" => "required"

        ]);
        try {
            Post::create([
                'title' => $this->title,
                'content' => $this->content,
                'slug' => $this->slug,
                'is_featured' => $this->isFeatured,
                'category_id' => $this->category_id,
                'status' => $this->status,
            ]);
            return redirect()->route('admin.post.list')->with('success', 'Post Successfully Created.');
        } catch (\Throwable $th) {
            $this->dispatch('postCreateStatus', ['error' => $th]);
        }


    }
    public function createCategory()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->parent_id = $this->parent_id;
        $category->save();
        $this->createModal = false;
        $this->dispatch('categoryCreated');
        $this->reset(['name', 'parent_id']);

    }
    public function openCreateModal()
    {
        $this->reset(['name', 'parent_id']);
        $this->createModal = true;
    }

}
