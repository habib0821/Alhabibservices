@extends('layouts.master')

@section('title', 'Add Post')

@section('content')
    <div class="container-fluid px-4">



        <div class="card mt-4">

            @if ($errors->any())

                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>

            @endif

            <div class="card-header">
                <h4>Add Post
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Post</a>
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Post Title</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" id="mysummernote" name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Youtube Iframe Link</label>
                        <input type="text" name="yt_iframe" class="form-control">
                    </div>


                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <input type="text" name="meta_keyword" class="form-control">
                    </div>


                    {{-- <h4>Status</h4>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div> --}}


                    <h4>File</h4>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="">Upload File</label>
                                <input type="file" name="file">
                            </div>
                        </div>
                    </div>





                    <div class="col-md-4">
                        <div class="mb-3">
                            <button class="btn btn-primary float-end" type="submit">Save Post</button>
                        </div>
                    </div>



            </div>
            </form>

        </div>


    </div>





@endsection
