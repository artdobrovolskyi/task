@extends('layouts.app')

@section('content')

    {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST']) }}
        <div class="form-group">
            <h1 class="p-4 pl-sm-0">Your post</h1>
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post title'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Post body'])}}
        </div>
    {{ Form::close() }}

    <h2 class="p-4 pl-sm-0">Visitors posts</h2>
    @if (count($posts) > 0)
        @foreach($posts as $post)
            <div class="jumbotron">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <p>{{$post->body}}</p>
                <small>{{$post->created_at}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection
