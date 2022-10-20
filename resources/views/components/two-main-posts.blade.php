
    @for ($i = 0; $i < 2; $i++)

        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{$all_posts[$i]->category->name}}</strong>
                    <h4 class="mb-0">{{$all_posts[$i]->subject}}</h4>
                    <a href="{{  route('posts.show',['post'=>$all_posts[$i]->id])}}" class="stretched-link">Continue reading</a>
                    <div class="mb-1 text-muted">{{$all_posts[$i]->creted_at}}</div>
                    <p class="card-text mb-auto">{{$all_posts[$i]->body}}</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img class="bd-placeholder-img" width="300" height="250" src="/public/{{$all_posts[$i]->image_path}}" alt="">
                </div>
            </div>
        </div>
        @endfor


