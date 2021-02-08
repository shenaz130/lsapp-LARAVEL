@extends('layouts.app')

@section('content')
    <h1 style="padding:100px 50px 0 150px;">Edit Post </h1>

    <form method="POST" action="{{'/posts/edit/'.$post->id}}">
         @csrf
          @method('PUT')
         <label for="title"> Title</label>
         <input id="title" {{$post->title}} name="title" type="text" class = 'form-control', placeholder = 'title here'>
         <label for="body"> Body</label>
         <input id="body" {{$post->body}} name="body" type="text" class = 'form-control', placeholder = 'Body text'>
          <input type="hidden" name="_method" value="put">
          <button type="submit" class= 'btn btn-primary'>Submit</button>
   
</form>
@endsection