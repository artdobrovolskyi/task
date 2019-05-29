@extends('layouts.app')

@section('content')
    <div class="text-right">
        <a href="/posts" class="btn btn-outline-secondary">Go back</a>
    </div>
    <h1 class="p-4 pl-sm-0">{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>{{$post->created_at}}</small>
@endsection
