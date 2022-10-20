@extends('layouts.front')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user())
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            My posts
        </h3>
        <table class=" table alert alert-primary">
            <thead>
            <tr>
                <th scope="col">Subject</th>
                <th scope="col">Title</th>
                <th scope="col">Comments</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <td>
                        {{$post->category->name}}
                    </td>
                    <td>
                        <a href="{{route('admin.posts.show',['post'=>$post->id])}}">
                            <p>{{$post->subject}}</p>
                        </a>
                    </td>
                    <td>
                        {{count(($post->comments))}}
                    </td>
                    <td>
                        <a href="{{route('admin.posts.edit',['post'=>$post->id])}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('admin.posts.destroy',['post'=>$post->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @else
        You are not authorized!!!
    @endif
    {{$posts->links()}}

@endsection
