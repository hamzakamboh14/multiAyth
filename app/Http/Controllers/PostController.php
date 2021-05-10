<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $post)
    {
        $id = Auth::user()->id;
        
        //   $post = User::find($id)->relationWithPost;
        $post = Post::where('user_id', '=', $id)->paginate(3);
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
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = Auth::user()->id;
        $post->user_id = $id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
         $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('images'), $imageName);
         $post->images = $imageName;
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $post->images = $imageName;
        session()->flash('success', 'Data updated!');
        if ($post->update()) {
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
        $image_path = 'images/'.$post->images;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
             File::delete($image_path);
            }
        // $image_path = ('images/'.$post->images);
        // $nn = File::delete(public_path($image_path));
        // if($nn){
            $post->delete();
            session()->flash('success', 'Data Delete!');
            if ($post) {
                return redirect()->back();
            } else {
                return 'Failed to delete';
            }
        //}
    }
}
