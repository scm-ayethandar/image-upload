<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all();
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create2');
    }

    public function store(Request $request)
    {
        $post = new Post();

        $post->name = $request->name;
        $post->save();

        // dd($request);

       
        // dd($post);

        if($request->hasfile('files'))
        {
           foreach($request->file('files') as $file)
           {
            // $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/image'), $filename);

            $image= new Image();

            $image->post_id = $post->id;
            $image->name = $filename;
            $image->path = 'upload/image';
            $image->url = 'http://127.0.0.1:8000/upload/image/'.$filename;

            $image->save();
           }
        }
        
        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts');
    }

    public function image_show($id)
    {
        $image = Image::find($id);

        return view('posts.image_show', compact('image'));
    }

    public function image_delete($id)
    {
        $image = Image::find($id);

        $image->delete();

        return back();
    }
}
