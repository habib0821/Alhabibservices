<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {

        $category = category::all();

        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();


        $category = new Category;
        $category->name = $data['name'];
        // $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/category', $filename);
            $category->image = $filename;
        }

            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keyword = $data['meta_keyword'];

            // $category->navbar_status = $request->navbar_status == true? '1':'0';
            // $category->status = $request->status == true ? '1' : '0';
            $category->created_by = Auth::user()->id;
            $category->save();

            return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    public function edit($category_id)
    {

        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));

    }

    public function update(CategoryFormRequest $request, $category_id)
    {


        $data = $request->validated();


        $category = Category::find($category_id);
        $category->name = $data['name'];
        // $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasfile('image')) {

            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/category', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        // $category->navbar_status = $request->navbar_status == true? '1':'0';
        // $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin/category')->with('message', 'Category Updated Successfully');

    }

    public function delete(Request $request)
    {
        $category = Category::find($request->category_delete_id);
        if ($category) {

            $destination = 'uploads/category/' .$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $category->posts()->delete();
            $category->delete();
            return redirect('admin/category')->with('message', 'Category Deleted with Its Posts Successfully');
        } else {
            return redirect('admin/category')->with('message', 'Category Not Found');
        }
    }



}
