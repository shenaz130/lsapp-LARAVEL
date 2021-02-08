@extends('layouts.app')

@section('content')
        <h1>{{$title}}</h1>
        @if (count($services)>0)
            <ul class ="list-group">
                @foreach ($services as $service )
                    <li class="list-item">{{$service}}</li>
                @endforeach
            </ul>
        
            
        @endif
        <p>Laboriosam repellendus eveniet delectus iste? Eligendi delectus ab molestiae, velit dolorem quas accusantium saepe molestias! Doloribus error aut repellat delectus rerum odit?
@endsection