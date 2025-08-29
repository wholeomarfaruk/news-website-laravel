<?php



namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CategoryPost extends Component
{
    public $perPage = 2;        // number of posts per load
    public $page = 1;           // current page
    public $allPosts;           // store already loaded posts
    public $totalcount;
    public $totalloaded;


    public function mount()
    {
        $this->allPosts = collect();
        $this->loadPosts();
    }

    public function loadMore()
    {
        $this->totalcount=Post::count();

        $this->page++;

        $this->loadPosts();
    }

    private function loadPosts()
    {
        $offset = ($this->page - 1) * $this->perPage;

        $newPosts = Post::latest()
                        ->skip($offset)
                        ->take($this->perPage)
                        ->get();

        // append new posts to the existing collection
        $this->allPosts = $this->allPosts->merge($newPosts);
    }

    public function render()
    {
        
        $total = Post::count();

        return view('livewire.category-post', [
            'posts' => $this->allPosts,
            'total' => $this->totalcount,
            'count'=> $total,
        ]);
    }
}
