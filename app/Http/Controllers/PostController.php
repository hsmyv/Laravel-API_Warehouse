<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestCreatePost;
use App\Models\Post;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function showcreate(){
        return view('post-store');
    }
    public function index(Post $post)
    {


        $users = User::All();
        $posts =  Cache::remember('post', 60*60*24*24, function(){
            return Post::All();
       });

        return view('index', compact('posts', 'users'));

    }

    public function showedit(Post $post)
    {
        return view('post-edit',compact('post'));

    }
    public function store(Request $request)
    {

       $attribute = $request->validate([
        'title' => 'required',
        'body'  => 'required'
       ]);
       $attribute['user_id'] = auth()->id();

       Post::create($attribute);

       if($request->hasFile('image')){
            $post->addMediaFromRequest('image')
                    ->usingName($request->title)
                    ->toMediaCollection('images');
       }

       if($request->hasFile('downloadimage')){
            $post->addMediaFromRequest('downloadimage')
                    ->usingName($request->title)
                    ->toMediaCollection('downloads');
       }


        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }


    public function update(RequestCreatePost $request, Post $post)
    {
        $post->update($request->validated());
        if($request->hasFile('image')){
            $post->addMediaFromRequest('image')->usingName($request->title)->toMediaCollection('images');
        }

        if($request->hasFile('downloadimage')){
            $post->addMediaFromRequest('downloadimage')->usingName($request->title)->toMediaCollection('downloads');
        }

        return redirect()->route('index');
    }

    public function download($id)
    {
        $post = Post::findOrFail($id);
        $media = $post->getFirstMedia('downloads');
        if(!$media)
        {
            return redirect()->route('index');
        }
        return $media;
    }
    public function downloads()
    {

        $media = Media::where('collection_name', 'downloads')->get();
        return Mediastream::create('downloads.zip')->addMedia($media);
    }

    public function prac()
    {
        return view('practiseaz');
    }
}
