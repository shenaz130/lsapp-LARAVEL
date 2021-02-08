@extends('layouts.app')

@section('content')
       <div class="bg-light p-5 rounded">
                <h1 style="margin-top:50px;" > {{$title}}</h1>
                <p class="lead">This example is a quick exercise to illustrate how the top-aligned navbar works. As you scroll, this navbar remains in its original position and moves with the rest of the page.</p>
                <a class="btn btn-lg btn-primary" href="/docs/5.0/components/navbar/" role="button">Login &raquo;</a>
                <a class="btn btn-lg btn-primary" href="/docs/5.0/components/navbar/" role="button">Register &raquo;</a>
         </div>
@endsection