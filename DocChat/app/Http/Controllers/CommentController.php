<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Comment;
use App\Post;
use Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Displays all comments on a post
           
     echo "Doing fine not";

     return view('posts.random', compact($storedComment));

    
      

      
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
    public function store(Request $request, $id)
    {
        //

         $post = Post::find($id);
        $comment = new Comment;
        
       
        $comment->commentContent = $request->postUnderCommentContent;
         $comment->commentName = $request->postUnderCommentName;
         $comment->postID = $post['id'];
        $comment->commentEmail= $request->postUnderCommentEmail;
        $comment->save();

        Session::flash('success', 'New comment has been successfully added!');
        return redirect()->route('posts.comments');
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

       $comment = Comment::find($id);
        return view('posts.comments')->with('storedComment', $comment);

        $this->validate($request, [ 'newCommentContent' => 'required|min:10|max:400',

            ]);
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
        $comment = new Comment;
        
       
        $comment->commentContent = $request->postUnderCommentContent;
         $comment->commentName = $request->postUnderCommentName;
         $comment->postID = $post['id'];
        $comment->commentEmail= $request->postUnderCommentEmail;
        $comment->save();

        Session::flash('success', 'New comment has been successfully added!');
        return redirect()->route('posts.index');
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
        //
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

        $comment = Comment::find($id);
        $comment->delete();

        Session::flash('success', 'comment has been deleted');
        return redirect()->route('posts.comments');
    }
}
