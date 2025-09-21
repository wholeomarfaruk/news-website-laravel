@extends('layouts.website')
@section('meta_title', $post->title)
@section('meta_description', Str::limit(strip_tags($post->excerpt), 160))
@section('meta_og_title', $post->title)
@section('meta_og_description', Str::limit(strip_tags($post->excerpt), 160))
@section('meta_og_image', $post->featured_image)
@section('meta_twitter_title', $post->title)
@section('meta_twitter_description', Str::limit(strip_tags($post->excerpt), 160))
@section('meta_twitter_image', $post->featured_image)
@section('meta_canonical', route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug]))

@section('content')
    @livewire('post-detail', ['id' => $post->id])
@endsection

