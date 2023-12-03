@extends('Frontend.layout.master')
@section('session')
@include("Frontend.includes.session")
@endsection
@section('sidebar')
@include("Frontend.includes.sidebar")
@endsection
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">{{$firstPost->title}}</h5>
            <small class="small text-muted">{{$firstPost->created_at}}
                <span class="px-2">-</span>
                <a href="#" class="text-muted">{{count($firstPost->comment)}} Comments</a>
            </small>
        </div>
        <div class="card-body position-relative" style="padding: 0">
            <div class="blog-media">
                <img src="{{asset('images/'.$firstPost->slug.'.jpg')}}" alt="" class="w-100">
            </div>
            <div class="d-flex position-absolute" style="top: 0;">
                @foreach ($firstPost->tag as $tag)
                    <a href="#" class="badge badge-primary">#{{$tag->name}}</a>
                @endforeach
            </div>
            <p class="my-2 text-description">{{$firstPost->sub_description}}</p>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
            <a href="{{route('front.post_detail', ['post' => $firstPost->title])}}" class="btn btn-outline-dark btn-md">READ MORE</a>
            <a href="#" class="text-dark small text-muted">By : {{$firstPost->user->name}}</a>
        </div>
    </div>
    <hr>
    <div class="row row-cols-6">
        @foreach ($latestPost as $val)
            <div class="col-lg-6">
                <div class="card text-center mb-5">
                    <div class="card-header p-0">
                        <div class="blog-media">
                            <img src="{{asset('images/'.$val->slug.'.jpg')}}" alt="" style="height: 200px; width:100%">
                            <a href="#" class="badge badge-primary">#alo</a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h5 class="card-title mb-2">{{$val->title}}</h5>
                            <small class="small text-muted">{{$val->created_at}}
                            <span class="px-2">-</span>
                            <a href="#" class="text-muted">93 Comments</a>
                            </small>
                        <p class="my-2 text-description">{{$val->sub_description}}</p>
                    </div>

                    <div class="card-footer p-0 text-center">
                        <a href="{{route('front.post_detail', ['post' => $val->title])}}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <a href="{{route('front.all_post')}}" class="btn btn-primary btn-block my-4">Load More Posts</a>
</div>

@endsection
@section('footer')
@include("Frontend.includes.footer")
@endsection
