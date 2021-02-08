@extends('layouts.app')

@section('content')
 <div class="border" style="margin: 100px 150px 80px 150px;" style="margin">
    <h1 > Posts welcome <h1>
      @if (count($post) > 1)
        @foreach ($post as $post)
            <div class="shadow-none p-4 mb-4 bg-light" >
                <h3 ><a href="/posts/{{ $post->id }}">{{ $post->title }}</h3>
            </div>
        @endforeach
       
     @else
        <p>No post found</p>
    @endif
</div>
@endsection

 