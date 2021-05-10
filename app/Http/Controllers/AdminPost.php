<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPost extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $post)
    {
        // $id = Auth::user()->id;
        
          $post = Post::paginate(5);
        // return PostResource::collection($list);
        return redirect()->back()->with('Data', $post);
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
    public function store(Request $request,Post $post)
    {   $id = Auth::user()->id;
        $post->user_id = $id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($post->save()) {
        session()->flash('success', 'Data inserted!');
       return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        $post = Post::find($id);
        return redirect()->back()->with('post',$post);
        // return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($post->save()) {
            // return new PostResource($post);
            return redirect()->back();
        } else {
            return 'fail';
        }
        // $post = Post::find($id)
        // ->update([
        //             'title'=>'new update title',
        //             'body'=>'Newly updated method to update data111'
        //         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        $post = Post::find($id);
        $post->delete();
        if ($post) {
            return redirect()->back();
        } else {
            return 'Failed to delete';
        }
    }


    public function ListUseredit(User $user)
    {
        //have to display users list
        $user = User::paginate(5)->all();
        session()->flash('success', 'Data inserted!');
        return view('admin.Userlist')->with('userlist', $user);
    }
    public function destroyuser(USer $user, $id)
    {
        $user = User::find($id);
        $user->delete();
        if ($user) {
            session()->flash('success', 'User Deleted!');
            return redirect()->back();
        } else {
            return 'Failed to delete';
        }
    }
}
