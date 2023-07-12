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
    public function getBlogPost($id)
    {
        $blogPost = BlogPost::find($id);
        return response()->json($blogPost);
    }

    public function getComments($id)
    {
        $comments = Comment::where('blog_post_id', $id)->get();
        return response()->json($comments);
    }

    public function storeComment(Request $request, $id)
    {
        // Store the new comment in the database
    }
}
