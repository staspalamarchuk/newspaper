<?php

namespace Newspaper\Http\Controllers;

use Illuminate\Http\Request;
use Newspaper\Post;

class HomeController extends Controller
{
    //
    public function index(){
        $all_posts = Post::simplePaginate(6);
        return view('index', compact('all_posts'));
    }

    public function createPost(){
        return view('create_post');
    }
}
