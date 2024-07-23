@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
    <div class="container-fluid px-4">

        <div class="row mt-3">

            <div class="col-md-12">

                @if (session('message'))
                <h4 class="alert alert-warning" >{{ session('message') }}</h4>

                @endif

                <div class="card">

                    <div class="card-header">
                        <h1>Website Settings</h1>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" @if ($setting)

                                value="{{ $setting->website_name }}" @endif required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Website Logo</label>
                                <input type="file" name="website_logo" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Website Favicon</label>
                                <input type="file" name="website_favicon" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control"> @if($setting) {{ $setting->description }} @endif</textarea>
                            </div>
                            <h4>SEO - Meta tags</h4>
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" rows="3" class="form-control"> @if($setting) {{ $setting->description }} @endif</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control"> @if($setting) {{ $setting->description }} @endif</textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>

    @endsection
