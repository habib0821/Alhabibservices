@extends('layouts.master')

@section('title', 'Category')

@section('content')


    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Category</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())

                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>

                @endif

                <form method="POST" action="{{ url('admin/add-category') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input class="form-control" name="name" type="text">
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" id="mysummernote" name="description" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input class="form-control" required name="image" type="file">
                    </div>


                    <h6>SEO Tags</h6>

                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input class="form-control" name="meta_title" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_description" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea class="form-control" name="meta_keyword" rows="5"></textarea>
                    </div>


                    <h6>Status Mode</h6>

                    <div class="mb-3">
                        <label for="">Navbar Status</label>
                        <input class="form-check-input" name="meta_title" type="checkbox">
                    </div>
                    <div class="mb-3">
                        <label for="">status</label>
                        <input class="form-check-input" name="meta_description" type="checkbox">
                    </div>

                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Category</button>
                    </div>



                </form>



            </div>
        </div>


    </div>

    @endsection

