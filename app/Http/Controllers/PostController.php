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
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();

        $post->name = $request->name;
        $post->save();

        // dd($request);

       
        // dd($post);

        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $file)
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

        // if($request->file('images')){

        //     $file= $request->file('image');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/image'), $filename);

        //     $image->post_id = $post->id;
        //     $image->name = $filename;
        //     $image->path = 'upload/image';
        //     $image->url = 'http://127.0.0.1:8000/upload/image/'.$filename;

           
        // }
        // $image->save();
        
        return redirect('/posts');
    }
}
