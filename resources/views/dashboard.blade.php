
@extends('layouts.app')

@section('content')
 <div class="border" style="margin: 100px 150px 80px 150px;" style="margin">
    <h1 >  welcome  to dashboard<h1>
        <a href= /post/create  class="btn btn-primary"> Create posts </a>
        @if (count($posts) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Your Posts</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($posts as $post) 
                <tr>
                    <td>{{ $post->title }}</td>
                    <td><a href= "{{'/posts/edit/'.$post->id}}" class="btn btn-success"> Edit </a></td>
                    <td> <form method="POST" action="{{'/posts/'.$post->id}}" class='pull-right'>
                        @csrf
                         @method('DELETE')
                       
                         {{-- <input type="hidden" name="_method" value="delete"> --}}
                         <button type="submit" class= 'btn btn-danger' >Delete</button>
                  
               </form>  </td>
                </tr>
                @endforeach
            </table>
        @else
            <p>Ypu have to add new posts<p>
        @endif
    </div>
@endsection
