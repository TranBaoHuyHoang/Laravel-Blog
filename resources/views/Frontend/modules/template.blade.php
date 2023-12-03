@extends('Frontend.layout.master')
@section('content')
<div class="page-content">
    @foreach ($posts as $post)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <small class="small text-muted">{{$post->created_at}}
                        <span class="px-2">-</span>
                        <a href="#" class="text-muted">32 Comments</a>
                    </small>
                </div>
                <div class="card-body position-relative" style="padding: 0">
                    <div class="blog-media">
                        <img src="{{asset('images/'.$post->slug.'.jpg')}}" alt="" class="w-100">
                    </div>
                    <div class="d-flex position-absolute" style="top: 0;">
                        @foreach ($post->tag as $tag)
                            <a href="#" class="badge badge-primary mr-2">#{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <p class="my-3 text-description">{{$post->sub_description}}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
                    <button class="btn btn-primary circle-35 mr-4"><i class="ti-back-right"></i></button>
                    <a href="{{route('front.post_detail', ['post' => $post->title])}}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                    <a href="#" class="text-dark small text-muted">By : {{$post->user->name}}</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @endforeach

    @if (count($posts) < 1)
        <h3 class="text-center text-danger">Not Post Found</h3>
    @endif
    {{$posts->links()}}
</div>

@endsection
