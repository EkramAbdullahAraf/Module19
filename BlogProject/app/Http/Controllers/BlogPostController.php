<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogPosts = BlogPost::all();
        return response()->json($blogPosts);
    }
    public function getComment()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function storeComment(Request $request)
    {
        $comment = new Comment();
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->save();

        return response()->json($comment);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blogPost = BlogPost::find($id);
        return response()->json($blogPost);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
