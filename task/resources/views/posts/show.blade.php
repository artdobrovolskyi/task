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
    <hr>
    <div class="text-right">
        {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])}}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
        {{Form::close()}}
    </div>
@endsection
