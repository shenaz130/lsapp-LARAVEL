@extends('layouts.app')

@section('content')
    <h1 style="padding:100px 50px 0 150px;">Edit Post </h1>

    <form method="POST" action="{{'/posts/edit/'.$post->id}}" enctype="multipart/form-data">
         @csrf
          @method('PUT')
         <label for="title"> Title</label>
         <input id="title" value='{{ $post->title}} ' name="title" type="text" class = 'form-control', placeholder = 'title here'>
         <label for="body"> Body</label>
         <input id="body" value= '{{$post->body}}' name="body" type="text" class = 'form-control', placeholder = 'Body text'>
         <input type="file" id="cover_image" name="cover_image" input type="submit">
         <input type="hidden" name="_method" value="put">
          <button type="submit" class= 'btn btn-primary'>Submit</button>
   
</form>
@endsection