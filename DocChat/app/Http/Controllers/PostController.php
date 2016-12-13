<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //displays all posts according to most recent post

        $posts = Post::orderBy('updated_at','asc')->get();
        return view('posts.index')->with('storedPosts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store each post in database
        $this->validate($request, [ 'newPostContent' => 'required|min:10|max:400',

            ]);

        $post = new Post;
        $post->postContent = $request->newPostContent;
        $post->created_at = $request->newPostTime;
        $post->postEmail = $request->newPostEmail;
        $post->postField= $request->newPostField;
        $post->save();

        Session::flash('success', 'New Post has been successfully added!');
        return redirect()->route('posts.index');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::find($id);
        /*return view('posts.index','postUnderEdit', $post);*/
        return view('posts.edit')->with('postUnderEdit', $post);
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
        //update post into database

         $this->validate($request, [ 'newPostContent' => 'required|min:10|max:400',

            ]);

         $post = Post::find($id);
        /*$post->content = $request->updatedPostContent;
        $post->timestamp = $request->updatedPostTime;
        $post->field= $request->updatedPostField;
        $post->save();*/

        $post->postContent = $request->updatedPostContent;
        $post->created_at = $request->updatedPostTime;
        $post->postField= $request->updatedPostField;
        $post->save();

        Session::flash('success', 'Post has been succesfully updated');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'post has been deleted');
        return redirect()->route('posts.index');
    }
}
