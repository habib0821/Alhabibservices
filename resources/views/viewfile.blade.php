@extends('layouts.app')


@section('title', "$category->meta_title")

@section('meta_description', "$category->meta_description")

@section('meta_keyword', "$category->meta_keyword")


@section('content')
    <div class="py-4">

        <div class="container">

            <div class="row">
                <h3>This is the Document View </h3>


                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <iframe src="/assets/{{ $post->$file }}" width="400" height="400" frameborder="0"></iframe>

                    </div>
                </div>


                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h2 class="post-heading" >No File Available</h2>
                    </div>
                </div>







            </div>
        </div>
    </div>
@endsection
