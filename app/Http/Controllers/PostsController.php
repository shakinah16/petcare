<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;//to be able to delete image. For storage:: library
use Illuminate\Http\Request;
use App\Post;//to use eloquent
use DB;//to use sql to query.

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all();
        // $posts = Post::where('title', 'First Post')->get();
        //$posts=DB::select('SELECT * FROM posts'); to use sql
        //$posts = Post::orderBy('created_at', 'asc')->take(1)->get();//to limit to just one post
        //$posts = Post::orderBy('created_at', 'asc')->get();

        $posts = Post::orderBy('created_at', 'asc')->paginate(10);//paginate with 10 per page
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);
        //Handle file upload
        if($request->hasFile('cover_image')){
          //Get filename with extension
          $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
          //Get just file name
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //Get just extension
          $extension = $request->file('cover_image')->getClientOriginalExtension();
          //Filename to Store
          $filenameToStore = $filename.'_'.time().'.'.$extension;

          $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }
        else {
          $filenameToStore = 'noimage.jpg';
        }
        //to create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
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
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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

        //Check for correct user_id
        if (auth()->user()->id != $post->user_id){
          return redirect('/posts')->with('error', 'You do not have permission to edit this post!');
        }

        return view('posts.edit')->with('post', $post);
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
         $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
          //Get filename with extension
          $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
          //Get just file name
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //Get just extension
          $extension = $request->file('cover_image')->getClientOriginalExtension();
          //Filename to Store
          $filenameToStore = $filename.'_'.time().'.'.$extension;

          $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }


        //to update post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
          $post->cover_image = $filenameToStore;

        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
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
        if (auth()->user()->id != $post->user_id){
          return redirect('/posts')->with('error', 'You do not have permission to delete this post!');
        }
        if ($post->cover_image !='noimage.jpg')
        {
          //Delete Image
          Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
