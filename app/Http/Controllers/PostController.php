<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\posts\show;
use App\posts\create;
use App\posts\edit;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
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
            'body'=> 'required',
            'cover_image' => 'image|nullable|max:1999'  
            ]);

        //handle file upload
        if($request->has_file('cover_image')){
           
             //get file name with extension
             $filenamewithext =$request->file('cover_image')->getClientOriginalName();
            //get just a file name
            $filename =pathInfo($filenamewithext, PATHINFO_FILENAME);
            //get just ext
            $extension =$request->file('cover_image')-> getClientOriginalExtension();
            //file to store
            $filleNameToStore= $filename.'_'.time().'.'.$extension;
            //upload image
           // $path= $request->file('cover_image')->storeAs('public/cover_images',$filleNameToStore);
            $path = Storage::putFile('public/cover_images', $request->file('cover_image'));
      
        }else{
            $filleNameToStore ='noimage.jpg';
        }

        //return redirect('/post');

        //create post
        $post= new Post;
        $post->title = $request->input('title');
        $post->body= $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image =$filleNameToStore;
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
        //handle file upload
        if($request->has_file('cover_image')){
           
            //get file name with extension
            $filenamewithext =$request->file('cover_image')->getClientOriginalName();
           //get just a file name
           $filename =pathInfo($filenamewithext, PATHINFO_FILENAME);
           //get just ext
           $extension =$request->file('cover_image')-> getClientOriginalExtension();
           //file to store
           $filleNameToStore= $filename.'_'.time().'.'.$extension;
           //upload image
          // $path= $request->file('cover_image')->storeAs('public/cover_images',$filleNameToStore);
           $path = Storage::putFile('public/cover_images', $request->file('cover_image'));
    

        //return redirect('/post');

        //edit post
        $post= Post::find($id);
        $post->title = $request->input('title');
        $post->body= $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $filleNameToStore;
        }
        $post->save();

        return redirect('/post')->with('success','post Updated');
    }
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
         
        if($post->cover_image != "noimage.jpg"){
            //delete image
            Storage::delete('public/cover_image/'.$post->cover_image);
        }

    }
}
