<?php

namespace Newspaper\Http\Controllers;

use Illuminate\Http\Request;
use Newspaper\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|max:3000',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post){
            return view('single_post', compact('post'));
        } else {
            return redirect(route("home"))->with("error", "Post with id {$id} not found!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|max:3000',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save;

        return redirect(route("post.show", $id))->with('status', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}
