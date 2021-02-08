<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\posts\show;
use App\posts\create;
use App\posts\edit;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::select('select * from posts');
      
        $posts= Post::orderBy('title','desc')->paginate(10);
        return view('posts.index')-> with('post',$posts);
 
        

       /* $title ='Welcome to Post';
        // return view('pages.index');
        return view('posts.index')-> with('title',$title);*/
        
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
        error_log("error found");
        $this -> validate($request,[
            'title'=> 'required',
            'body'=> 'required'
        ]);

        //return redirect('/post');

        //create post
        $post= new Post;
        $post->title = $request->input('title');
        $post->body= $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/post')->with('success','post created');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post= Post::find($id);
        
        return view('posts.show')-> with('post', $post);
        //return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
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
        error_log("error found");
        $this -> validate($request,[
            'title'=> 'required',
            'body'=> 'required'
        ]);

        //return redirect('/post');

        //edit post
        $post= Post::find($id);
        $post->title = $request->input('title');
        $post->body= $request->input('body');
        $post->save();

        return redirect('/post')->with('success','post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();

        return redirect('/post')->with('success','post Removed');

    }
}
