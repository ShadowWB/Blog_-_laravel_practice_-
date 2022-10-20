<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminFormRequest;

class PostControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id',Auth::id())->paginate(20);
        return view('pages.admin.index',[
              'posts'=>$posts
        ]);

//        dd(Auth::user(),Auth::id());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create',[
            'opt'=>config('blog.statuses.options')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdminFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminFormRequest $request)
    {
//       dd($request->all());
        $post = new Post();
        $post->user_id=Auth::id();
        $post->subject=$request->subject;
        $post->body=$request->body;
        $post->category_id=$request->category;
        $post->status=$request->status;

        if ($request->file('image')!==null) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $post->image_path = 'img/' . $filename;
        }
        $post->save();

        $posts = Post::where('user_id',Auth::id())->paginate(20);
        return redirect()->route('admin.posts.index',[
            'posts'=>$posts
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('pages.admin.posts.show',[
            'post'=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('pages.admin.posts.edit',[
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
//        dd($request->category);
        $post->user_id=Auth::id();
        $post->subject=$request->subject;
        $post->body=$request->body;
        $post->category_id=$post->category->id;
        $post->status=$request->status;
        $post->created_at=now();
        $post->updated_at=now();

        if ($request->file('image')!==null) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $post->image_path = 'img/' . $filename;
        }
        $post->update();

        $posts = Post::where('user_id',Auth::id())->paginate(20);
        return redirect()->route('admin.posts.index',[
            'posts'=>$posts
            ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       $post->destroy($post->id);

        $posts = Post::where('user_id',Auth::id())->paginate(20);
        return redirect()->route('admin.posts.index',[
            'posts'=>$posts
        ]);
    }
}
