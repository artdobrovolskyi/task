@extends('layouts.app')

@section('content')
    {{Form::open(['action' => 'PostsController@store', 'method' => 'POST'])}}
    <div class="form-group">
        <h1 class="p-4 pl-sm-0">Your post</h1>
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post title'])}}
    </div>
    <div class="form-group">
        {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Post body'])}}
    </div>
    <div class="text-right">
        {{Form::submit('Submit', ['class' => 'btn btn-outline-secondary'])}}
    </div>
    {{Form::close()}}

    <h2 class="p-4 pl-sm-0">Visitors posts</h2>
    @if (count($posts) > 0)
        @foreach($posts as $post)
            <div class="jumbotron">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <p>{{$post->body}}</p>
                <small>{{$post->created_at}} by {{$post->user->name}}</small>
                @if ($user->is_admin === 1)
                    <div class="text-right">
                        {{Form::open(['action' => ['PostsController@edit', $post->id], 'method' => 'GET', 'class' => 'pull-right'])}}
                        {{Form::submit('Blocked User', ['class' => 'btn btn-outline-danger'])}}
                        {{Form::close()}}
                    </div>
                @endif
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection
