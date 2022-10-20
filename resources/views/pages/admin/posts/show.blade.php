@extends('layouts.front')

@section('content')
    <h2 class="pb-4 mb-4 fst-italic border-bottom">
        {{$post->subject}}
    </h2>

    <article class="blog-post">

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

            <td>
                <p class="btn btn-outline-warning">
                    <a href="{{route('admin.posts.edit',['post'=>$post->id])}}">Edit</a>
                </p>
            </td>
            <td>
                <form action="{{route('admin.posts.destroy',['post'=>$post->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </td>
        <hr>
        <p class="btn btn-outline-warning">
            <a href="{{ url()->previous() }}"> Go Back</a>
        </p>
    </article>

@endsection

