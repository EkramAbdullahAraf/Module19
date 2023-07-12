<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('blog');
    }

    public function getBlogPosts()
    {
        $blogPosts = BlogPost::all();
        return response()->json($blogPosts);
    }

    public function getRecentPosts()
    {
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->limit(5)->get();
        return response()->json($recentPosts);
    }

    public function getComments()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function storeComment(Request $request)
    {
        // Store the new comment in the database
    }

}
