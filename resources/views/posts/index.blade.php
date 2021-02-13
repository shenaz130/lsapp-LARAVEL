@extends('layouts.app')

@section('content')
 <div class="border" style="margin: 100px 150px 80px 150px;" style="margin">
    <h1 > Posts welcome <h1>
      @if (count($post) > 1)
        @foreach ($post as $post)
            <div class="shadow-none p-4 mb-4 bg-light" >
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" , src="/storage/cover_images/{{ $post->cover_image }}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3 ><a href="/posts/{{ $post->id }}">{{ $post->title }}</h3>
                            <small>Written on {{ $post->created_at }} by {{ $posts->user->name }}</small>
                </div>
                
            </div>
        @endforeach
       
     @else
        <p>No post found</p>
    @endif
</div>
@endsection

 