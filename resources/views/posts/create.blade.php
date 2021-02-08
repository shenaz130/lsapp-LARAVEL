@extends('layouts.app')

@section('content')
    <h1 style="padding:100px 50px 0 150px;"> Create Post </h1>

    <form method="POST" action="/post">
         @csrf
         <label for="title"> Title</label>
         <input id="title" name="title" type="text" class = 'form-control', placeholder = 'title here'>
         <label for="body"> Body</label>
         <input id="body" name="body" type="text" class = 'form-control', placeholder = 'Body text'>
         <button type="submit" class= 'btn btn-primary' >Submit</button>
   
</form>

   {{-- {!! Form::open(['action' => [PageController::class, 'store'], 'method' => 'POST']) !!}
       echo Form::open(['action' => 'PostController@store'])

        <div class="form-group"  style="margin: 20px 150px 80px 150px;" style="margin">
            {{Form::label ('title','')}}
            {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'title here'])}}
        </div>
        <div class="form-group"  style="margin: -70px 50px 50px 150px;" style="margin">
            {{Form::label ('body','Body')}}
            {{Form::textarea('body','',['class' => 'form-control', 'placeholder' => 'body here'])}}
        </div>
        <div class="form-group"  style="margin: -50px 50px 80px 150px;" style="margin">
             {{form::submit('Submit',['class'=> 'btn btn-primary'],['style'=> "margin: 20px 50px 80px 50px" ])}}
        </div>
           
     {!! Form::close() !!}--}}
@endsection
