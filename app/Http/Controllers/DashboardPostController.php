<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->latest()->paginate(15);
        return view('dashboard.post.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $img_name = $request->file('image')->getClientOriginalName();
        $new_img_name = time() . $img_name;


        $request->validate([
            'title' => 'required|max:120',
            'category' => 'required',
            'image' => 'required|image|file|max:1024',
            'body' => 'required'
        ]);
        $post = new Post();
        $new_body = strip_tags($request->body);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->user_id = auth()->user()->id;
        $post->excerpt = substr($new_body, 0, 200);
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->published_at = date('y-m-d');

        $request->file('image')->move(public_path('images/post-images'), $new_img_name);
        $post->image = $new_img_name;
        // $post->image = $request->file('image')->store('post-image');
        $post->save();

        return redirect()->to('/dashboard/posts')->with('success', 'The post was uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.post.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:120',
            'category' => 'required',
            'body' => 'required'
        ];

        if ($request->file('image')) {
            $rules['image'] = 'image|file|max:1024';
        }

        $validatedData = $request->validate($rules);

        $post = Post::find($post->id);
        $new_body = strip_tags($request->body);

        if ($request->file('image')) {
            if ($request->oldimage) {
                // Storage::delete($request->oldimage);
                File::delete('images/post-images/' . $request->oldimage);
            }
            // $post->image = $request->file('image')->store('post-image');
            $new_img_name = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/post-images'), $new_img_name);
            $post->image = $new_img_name;
        }
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        $post->body = $request->body;
        $post->excerpt = substr($new_body, 0, 200);

        $post->save();

        return redirect()->to('/dashboard/posts')->with('success', 'Updated' . $post->title . 'success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            File::delete('images/post-images/' . $post->image);
            // Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect()->to('/dashboard/posts')->with('success', 'Post with title ' . $post->title . ' was deleted!');
    }

    //geting a slug geerate from title
    public function getSlug(Request $request)
    {
        $slug =  SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
