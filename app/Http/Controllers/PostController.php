<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\StoreBlogPost;
use Auth;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $this->authorize('view',Post::class);

      $posts = Post::orderBy('created_at','desc')
      ->paginate(5);

      return view('post.index', [
        'posts' => $posts,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('post.create',['post' => $post,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $post = new Post();
        $post->fill($request->all());
        $file = $request->file('image');
        $image_name = Carbon::now()->timestamp.Auth::user()->id.'.jpg';
        $path = $file->storeAs('public/posts', $image_name);
        $post->image=$image_name;
        $post->save();

        return redirect()->route('post.show',$post->id);
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
        if(!$post)throw new ModelNotFoundException;
        return view('post.show')->withPost($post);
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
      if(!$post) throw new ModelNotFoundException;

      $this->authorize('manage',$post);

      return view('post.edit',[
        'post' => $post
      ]);
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
      $post = Post::find($id);
      if(!$post) throw new ModelNotFoundException;

      $post->fill($request->all());
      $file = $request->file('image');
      
      $image_name = Carbon::now()->timestamp.Auth::user()->id.'.jpg';

      $path = $file->storeAs('public/posts', $image_name);
      $post->image=$image_name;
      $post->save();

      return redirect()->route('post.index');
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
      return redirect()->route('post.index');
    }
}
