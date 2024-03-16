<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all()->orderby("id","ASC")->get();
        $posts = Post::orderBy("id", "ASC")->paginate(5);
        return view("Posts.posts", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        Post::create([
            "title" => $request->title,
            "description" => $request->desc,
        ]);
        return redirect(route("index"))->with(["success" => "added successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posts = Post::FindorFail($id);
        return view("Posts.edit", compact("posts"));

        // or
        // return view("Posts.edit", ["post" => $post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $post = Post::FindorFail($id);
        $post->update([
            "title" => $request->title,
            "description" => $request->desc,
        ]);
        return redirect(route("index"))->with(["success" => "Edit successfully"]);
        // return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route("index"))->with(["success" => "Deleted successfully"]);
    }

    // ajax_search
    public function ajax_search(Request $request)
    {
        if ($request->ajax()) {
            $ajax_search = $request->ajax_search;
            $posts = Post::where("name", "like", "% {$ajax_search} %")->orderBy("id", "ASC")->paginate(1);
            return view("Posts.ajax_search", compact("posts"));
        }
    }
}