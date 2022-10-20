@extends('layouts.front')

@section('content')
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Latest posts
    </h3>

    @foreach($posts as $post)
        <article class="blog-post">
            <a href="{{route('posts.show',['post'=>$post->id])}}">
                <h2 class="blog-post-title mb-1">{{$post->subject}}</h2>
            </a>
            <p class="blog-post-meta">{{$post->created_at}} by <a href="#">{{$post->user->name}}</a></p>
            <p>{{$post->body}}</p>
            <p>
                <img src="/public/{{$post->image_path}}" width="100%" alt="">
            </p>
            <ul>
                <li>Author pseudonym: {{$post->user->nickname}}</li>
                <li>Author email: {{$post->user->email}}</li>
                <li>Website: {{$post->user->website?$post->user->website:'no website.'}}</li>
            </ul>
            <p>
            <hr>
            </p>
        </article>
    @endforeach

    {{$posts->links()}}

@endsection

