

@extends('layouts.master')

@section('title', 'Category')

@section('content')


    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Category</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())

                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>

                @endif

                <form method="POST" action="{{ url('admin/update-category/'.$category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input class="form-control" name="name" value="{{ $category->name }}" type="text">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" id="mysummernote" name="description" rows="5">{{ $category->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input class="form-control" name="image" value="{{ $category->image }}" type="file">
                    </div>


                    <h6>SEO Tags</h6>

                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input class="form-control" name="meta_title" value="{{ $category->meta_title }}" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_description"  rows="5">{{ $category->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea class="form-control" name="meta_keyword"  rows="5">{{ $category->meta_keyword }}</textarea>
                    </div>


                    <h6>Status Mode</h6>

                    <div class="mb-3">
                        <label for="">Navbar Status</label>
                        <input class="form-check-input" name="meta_title" {{ $category->navbar_status == '1' ? 'checked': '' }}" type="checkbox">
                    </div>
                    <div class="mb-3">
                        <label for="">status</label>
                        <input class="form-check-input" name="meta_description" {{ $category->status == '1' ? 'checked' : '' }}" type="checkbox">
                    </div>

                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Update Category</button>
                    </div>



                </form>



            </div>
        </div>


    </div>

    @endsection
