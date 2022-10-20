<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Template | My blog</title>
{{--    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">--}}
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('img/3.ico')}}" sizes="32x32" type="image/png">
    <meta name="theme-color" content="#712cf9">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="btn btn-sm btn-outline-secondary" href="{{route('register')}}">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">I KNOW EVERYTHING</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                         viewBox="0 0 24 24"><title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5"/>
                        <path d="M21 21l-5.2-5.2"/>
                    </svg>
                </a>
                <a class="btn btn-sm btn-outline-secondary" href="{{route('dashboard')}}">Sign up/Log Out</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2 border-bottom">
        <nav class="nav d-flex justify-content-between ">
                @foreach($categories as $category)
                    <a class="p-2 link-secondary " href="{{route('categories.show',['category'=>$category->id])}}">
                        {{$category->name}}
                    </a>
                @endforeach
            </nav>
    </div>

</div>

<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">
                <div>I</div>
                <div>KNOW</div>
                <div>EVERYTHING</div>
            </h1>
            <p class="lead my-3">А treasure chest of interesting information!</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2">
     <x-two-main-posts/>
    </div>

    <div class="row g-5">
        <div class="col-md-8">
          @yield('content')

        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                @if(\Illuminate\Support\Facades\Auth::user())
               <x-admin-panel/>
                @else
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">Get Your ADMIN Panel !</h4>

                    <p class="mb-0">Subscribe or log in to create your own Post!!!</p>
                    <hr>
                    <div class="row align-items-center">
                        <div class="row-cols-3">
                            <a class="btn btn-sm btn-outline-secondary" href="{{route('register')}}">Subscribe</a>
                        </div>
                            <div class="d-flex justify-content-end align-items-center">
                            <a class="btn btn-sm btn-outline-secondary" href="{{route('dashboard')}}">Sign up/Log Out</a>
                        </div>
                    </div>
                </div>
                    @endif
                <div class="p-4">
                    @if($archive->count()>0)
                    <h4 class="fst-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        @foreach($archive as $item)
                            <li>
                                <a href="{{route('posts.archive',['year'=>$item->post_year,'month'=>$item->post_month_number])}}">{{$item->post_month_name}} {{$item->post_year}} ({{$item->qty}})</a>
                            </li>
                        @endforeach
                    </ol>
                    @endif
                </div>

                <div class="p-4">
                    <h4 class="fst-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

</main>

<footer class="blog-footer">

    <p>
        <a href="#">Back to top</a>
    </p>
    <p>
        <a href="{{route('posts.index')}}"> Main page</a>
    </p>
</footer>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
