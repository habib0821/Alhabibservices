<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
    public function create(){

        $category = Category::where('status', '0')->get();
        return view('admin.post.create', compact('category'));
    }
    public function store(PostFormRequest $request){
        $data = $request->validated();

        // $data=new Post;
        $post = new post;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;

        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $post->file=$filename;

        $post->save();

        return redirect('admin/posts')->with('message', 'Post Added Successfully');
    }


    public function edit($post_id){

        $category = Category::where('status', '0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit', compact('post', 'category'));
    }

    public function update(PostFormRequest $request, $post_id){
        $data = $request->validated();

        $post = Post::find($post_id) ;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;

        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $data->file=$filename;

        $post->update();

        return redirect('admin/posts')->with('message', 'Post Updated Successfully');
    }

    public function delete($post_id){
        $post_id = Post::find($post_id);
        $post_id->delete();

        return redirect('admin/posts')->with('message', 'Post Deleted Successfully');
    }

    public function download(Request $request, $file){

        return response()->download(public_path('assets/'.$file));

    }

    public function view($id){
        $post = post::find($id);
        return view('viewfile', compact('post'));
    }



}
