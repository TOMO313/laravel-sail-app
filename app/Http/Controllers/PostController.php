<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Inertia\Inertia;
use Redirect;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
       return inertia("Post/Index", ["posts"=>Post::with('category')->get()]);
    }
    
    public function show(Post $post)
    {
        return inertia("Post/Show", ["post"=>$post->load('category')]);
    }

    public function create(Category $category)
    {
        return inertia("Post/Create", ["categories"=>$category->get()]);
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return Redirect::route("show", $post->id);
    }

    public function edit(Post $post)
    {
        return inertia("Post/Edit", ["post"=>$post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return Redirect::route("show", $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return Redirect::route('index');
    }
}