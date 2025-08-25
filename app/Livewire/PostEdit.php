<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Media;
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
    public $featured_image_url;
    public function mount($id)
    {
        $this->postId = $id;
        $post = Post::find($id);
        $this->post = $post;
        $this->title = $post->title;
        $this->category_id = $post->category_id;
        $this->slug = $post->slug;
        $this->content = $post->content;
        $this->excerpt = $post->excerpt;
        $this->status = $post->status;
        $this->url = $this->url = url('/') . "/" . $post->slug;
        $this->isFeatured = $post->is_featured;
        $this->publish_date = $post->updated_at;
  $media = $post->media()->where('category','featured_image')->first();
    $this->featured_image_url = $media ? asset('storage/' . $media->path) : null;

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




            $post->title = $this->title;
            $post->content = $this->content;
            $post->slug = $this->slug;
            $post->is_featured = $this->isFeatured;
            $post->category_id = $this->category_id;
            $post->status = $this->status;
            $post->excerpt = $this->excerpt;
            $post->save();
            if ($this->featured_image) {
                // Generate random filename
                $filename = Str::random(20) . '.' . $this->featured_image->getClientOriginalExtension();

                // Store file in 'public/media'
                $path = $this->featured_image->storeAs('media', $filename, 'public');

                // Save in media table
                $media = $post->media->where('category', 'featured_image')->first();
                if ($media) {
                    $media->filename = $filename;
                    $media->original_name = $this->featured_image->getClientOriginalName();
                    $media->mime_type = $this->featured_image->getMimeType();
                    $media->extension = $this->featured_image->getClientOriginalExtension();
                    $media->size = $this->featured_image->getSize();
                    $media->type = 'image';
                    $media->category = 'featured_image';
                    $media->disk = 'public';
                    $media->path = $path;
                    $media->mediable_id = $post->id;
                    $media->mediable_type = Post::class;
                    $media->user_id = auth()->id();
                    $media->save();

                } else {
                    $media = new Media();
                    $media->filename = $filename;
                    $media->original_name = $this->featured_image->getClientOriginalName();
                    $media->mime_type = $this->featured_image->getMimeType();
                    $media->extension = $this->featured_image->getClientOriginalExtension();
                    $media->size = $this->featured_image->getSize();
                    $media->type = 'image';
                    $media->category = 'featured_image';
                    $media->disk = 'public';
                    $media->path = $path;
                    $media->mediable_id = $post->id;
                    $media->mediable_type = Post::class;
                    $media->user_id = auth()->id();
                    $media->save();

                }

            }
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
