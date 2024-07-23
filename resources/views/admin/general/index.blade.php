@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
    <div class="container-fluid px-4">

        <div class="row mt-3">
            <div class="col-md-12">

                @if (session('message'))
                    <h4 class="alert alert-warning">{{ session('message') }}</h4>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Website Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" @if ($setting) value="{{ $setting->website_name }}" @endif class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Website Logo</label>
                                <input type="file" name="website_logo" class="form-control" />
                                @if ($setting)
                                    <img src="{{ asset('upload/settings/'.$setting->logo) }}" width="70px" height="70px" alt="logo">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="">Website Favicon</label>
                                <input type="file" name="website_favicon" class="form-control" />
                                @if ($setting)
                                    <img src="{{ asset('upload/settings/'.$setting->favicon) }}" width="70px" height="70px" alt="favicon">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control"> @if ($setting){{ $setting->description }} @endif</textarea>
                            </div>

                            <h4>SEO - Meta Tags</h4>

                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title"  @if ($setting) value="{{ $setting->meta_title }}" @endif class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" rows="3" class="form-control"> @if ($setting) {{ $setting->meta_keyword }} @endif</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control">  @if ($setting){{ $setting->meta_description }} @endif </textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>


        </div>


    </div>


@endsection
