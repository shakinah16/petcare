<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;//to use eloquent
use DB;//to use sql to query.

class ProductsController extends Controller
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

        $products = Product::orderBy('created_at', 'asc')->paginate(10);//paginate with 10 per page
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'price' => 'required',
            'sku' => 'required',
            'stock' => 'required',
            'product_image' => 'image|nullable|max:1999',
        ]);
        //Handle file upload
        if($request->hasFile('product_image')){
          //Get filename with extension
          $filenameWithExt = $request->file('product_image')->getClientOriginalName();
          //Get just file name
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //Get just extension
          $extension = $request->file('product_image')->getClientOriginalExtension();
          //Filename to Store
          $filenameToStore = $filename.'_'.time().'.'.$extension;

          $path = $request->file('product_image')->storeAs('public/product_image', $filenameToStore);
        }
        else {
          $filenameToStore = 'noimage.jpg';
        }
        //to create products
        $product = new Product;
        $product->title = $request->input('title');
        $product->body = $request->input('body');
        $product->price = $request->input('price');
        $product->sku = $request->input('sku');
        $product->stock = $request->input('stock');
        //$product->product_id = auth()->products()->id;
        $product->product_image = $filenameToStore;
        $product->save();

        return redirect('/products')->with('success', 'Product Created');
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
        $products = Product::find($id);
        return view('products.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);

        /*Check for correct user_id
        if (auth()->product()->id != $products->product_id){
          return redirect('/products')->with('error', 'You do not have permission to edit this pproduct!');
        }*/

        return view('products.edit')->with('products', $products);
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
        if($request->hasFile('product_image')){
          //Get filename with extension
          $filenameWithExt = $request->file('product_image')->getClientOriginalName();
          //Get just file name
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //Get just extension
          $extension = $request->file('product_image')->getClientOriginalExtension();
          //Filename to Store
          $filenameToStore = $filename.'_'.time().'.'.$extension;

          $path = $request->file('product_image')->storeAs('public/products_image', $filenameToStore);
        }


        //to update post
        $products = Product::find($id);
        $products->title = $request->input('title');
        $products->body = $request->input('body');
        $products->price = $request->input('price');
        $products->sku = $request->input('sku');
        $products->stock = $request->input('stock');

        if($request->hasFile('product_image')){
          $products->product_image = $filenameToStore;

        }
        $products->save();

        return redirect('/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
        $product = Product::find($id);
        //if (auth()->user()->id != $post->user_id){
         // return redirect('/posts')->with('error', 'You do not have permission to delete this post!');
       // }
        if ($product->product_image !='noimage.jpg')
        {
          //Delete Image
          Storage::delete('public/products_image/'.$product->product_image);
        }
        $product->delete();
        return redirect('/products')->with('success', 'Product Removed');
    }
}
