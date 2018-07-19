<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{

public function __construct()
{
  $this->middleware('auth')->only('create');
}

/**
 * Show posts.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  return view('posts', ['posts' => Post::all()]);
}

/**
 * Show a specific post
 *
 * @return \Illuminate\Http\Response
 */
public function show(Post $post)
{
  return view('post')->withPost($post);
}

/**
 * Persist post to database
 *
 * @param  Request $request
 * @return \Illuminate\Http\Response
 */
public function create(Request $request)
{

  $post = Auth::user()->posts()->create($request->validate([
    'title' => 'required|string',
    'body'  => 'required|string',
  ]));

  return redirect()->route('post', $post);
}
}