@extends('layouts.front')

@section('content')
@if($errors->any())
    <div class="alert-danger alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif
<form class="alert alert-success" method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="subject" class="text">Title</label>
        <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Post </label>
        <textarea type="password" name="body" class="form-control" id="exampleInputPassword1"></textarea>
    </div>
    <div class="mb-3">
        <select name="category" class="form-select" aria-label="Default select example">
            <option selected>Category</option>
            @foreach($categories as $category)
                <option  value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <select name="status" class="form-select" aria-label="Default select example">
            <option selected>Status</option>
            @foreach($opt as $post)
                <option  value="{{$post}}">{{$post}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input name="image" class="form-control" type="file" id="formFile">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<hr>
<p class="btn btn-outline-warning">
    <a href="{{ url()->previous() }}"> Go Back</a>
</p>
@endsection
