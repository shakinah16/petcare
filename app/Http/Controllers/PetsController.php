<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;//to be able to delete image. For storage:: library
use App\Pet;//to use eloquent

class PetsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
      // $pets = Post::all();
      // $pets = Post::where('title', 'First Post')->get();
      //$pets=DB::select('SELECT * FROM posts'); to use sql
      //$pets = Post::orderBy('created_at', 'asc')->take(1)->get();//to limit to just one post
      //$pets = Post::orderBy('created_at', 'asc')->get();

      $pets = Pet::orderBy('created_at', 'asc')->paginate(10);//paginate with 10 per page
      return view('pets.index')->with('pets', $pets);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pets.create');
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
          'name' => 'required',
          'type' => 'required',
          'color' => 'required',
          'pet_image' => 'image|nullable|max:1999',
      ]);

      //Handle file upload
            if($request->hasFile('pet_image')){
              //Get filename with extension
              $filenameWithExt = $request->file('pet_image')->getClientOriginalName();
              //Get just file name
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              //Get just extension
              $extension = $request->file('pet_image')->getClientOriginalExtension();
              //Filename to Store
              $filenameToStore = $filename.'_'.time().'.'.$extension;

              $path = $request->file('pet_image')->storeAs('public/pet_images', $filenameToStore);
            }
            else {
              $filenameToStore = 'noimage.jpg';
            }
            //to create pet
            $pet = new Pet;
            $pet->name = $request->input('name');
            $pet->type = $request->input('type');
            $pet->color = $request->input('color');
            $pet->user_id = auth()->user()->id;
            $pet->pet_image = $filenameToStore;
            $pet->save();

            return redirect('/pets')->with('success', 'Pet Saved');
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
      $pet = Pet::find($id);
      return view('pets.show')->with('pet', $pet);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $pet = Pet::find($id);
      return view('pets.edit')->with('pet', $pet);
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

      //to update post
      $pet = Post::find($id);
      $pet->title = $request->input('title');
      $pet->body = $request->input('body');
      $pet->save();

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
      $pet = Post::find($id);
      $pet->delete();
      return redirect('/posts')->with('success', 'Post Removed');
  }
}
