<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\General;

class FrontendController extends Controller
{
    public function index(){

        $setting = General::find(1);
        $all_categories = Category::where('status', '0')->get();
        $latest_posts = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(10);
        return view('Frontend.index', compact('all_categories', 'latest_posts', 'setting'));
    }

    public function viewCategoryPost(string $category_slug){
        $category = Category::where('slug', $category_slug)->where('status', 'o')->first();
        if($category){
                $post = Post::where('category_id', $category->id)->where('status', '0')->paginate(10);
                return view('frontend.post.index', compact('post', 'category'));
            }
            else{
                    return redirect('/');
                }
                    }



    public function viewPost(string $category_slug, string $post_slug){
        $category = Category::where('slug', $category_slug)->where('status', 'o')->first();
        if($category){
                $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
                $latest_posts = Post::where('category_id', $category->id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(10);
                return view('frontend.post.view', compact('post', 'latest_posts'));
            }
            else{
                    return redirect('/');
                }
    }





}
