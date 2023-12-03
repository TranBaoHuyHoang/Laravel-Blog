@extends('Frontend.layout.master')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header pt-0">
            <h3 class="card-title mb-4">{{$post->title}}</h3>
            <div class="position-relative">
                <img src="assets/imgs/blog-6.jpg" alt="" class="w-100">
                <div class="d-flex position-absolute" style="top: 0;">
                    @foreach ($post->tag as $tag)
                        <a href="#" class="badge badge-primary mr-2">#{{$tag->name}}</a>
                    @endforeach
                </div>


            </div>
            <small class="small text-muted">
                <a href="#" class="text-muted">BY {{$post->user->name}}</a>
                <span class="px-2">·</span>
                <span>{{$post->created_at}}</span>
                <span class="px-2">·</span>
                <a href="#" class="text-muted">{{count($post->comment)}} Comments</a>
            </small>
        </div>
        <div class="card-body border-top post-description">
            <p>
                {!! $post->description !!}
            </p>
        </div>

        <div class="card-footer">
            @if (count($post->comment) < 1)
                <h6 class="mt-5 mb-3 text-center"><a href="#" class="text-dark">Comments {{count($post->comment)}}</a></h6>
                <hr>
            @endif

            @foreach ($post->comment as $comment)
                <div class="media">
                    <img src="assets/imgs/avatar-1.jpg" class="mr-3 thumb-sm rounded-circle" alt="...">
                    <div class="media-body">
                        <h6 class="mt-0">{{$comment->user->name}}</h6>
                        <p>{{$comment->comment}}</p>

                        <form action="{{route('comment.store')}}" class="form-row" method="POST">
                            @csrf
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <input type="hidden" value="{{$comment->id}}" name="comment_id">
                            <input type="text" name="comment" class="form-control" placeholder="Write Your Command">
                            <div class="col-2 my-2">
                                <button type="submit" class="btn btn-primary btn-block">Reply</button>
                            </div>

                            @foreach ($comment->replay as $replay)
                                <div class="media mt-2">
                                    <a class="mr-3" href="#">
                                    <img src="assets/imgs/avatar.jpg" class="thumb-sm rounded-circle" alt="...">
                                    </a>
                                    <div class="media-body align-items-center">
                                        <h6 class="mt-0">{{$replay->user->name}}</h6>
                                        <p class="text-comment">{{$replay->comment}} </p>
                                    </div>
                                </div>
                            @endforeach

                        </form>

                    </div>
                </div>
            @endforeach

            {{-- <div class="media mt-5">
                <img src="assets/imgs/avatar-2.jpg" class="mr-3 thumb-sm rounded-circle" alt="...">
                <div class="media-body">
                    <h6 class="mt-0">Crosby Meadows</h6>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                    <a href="#" class="text-dark small font-weight-bold"><i class="ti-back-right"></i> Replay</a>
                </div>
            </div>
            <div class="media mt-4">
                <img src="assets/imgs/avatar-3.jpg" class="mr-3 thumb-sm rounded-circle" alt="...">
                <div class="media-body">
                    <h6 class="mt-0">Jean Wiley</h6>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                    <a href="#" class="text-dark small font-weight-bold"><i class="ti-back-right"></i> Replay</a>
                </div>
            </div> --}}

            <h6 class="mt-5 mb-3 text-center"><a href="#" class="text-dark">Write Your Comment</a></h6>
            <hr>
            <form method="POST" action="{{route('comment.store')}}">
                @csrf
                <div class="form-row">
                    <div class="col-12 form-group">
                        <input type="hidden" value="{{$post->id}}" name="post_id">
                        <textarea name="comment" id="" cols="30" rows="6" class="form-control" placeholder="Enter Your Comment Here"></textarea>
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-block">Post Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <h6 class="mt-5 text-center">Related Posts</h6>
    <hr>
    <div class="row">
        @foreach ($postRelates as $postRandom)
            <div class="col-md-6 col-lg-4">
                <div class="card mb-5">
                    <div class="card-header p-0 position-relative">
                        <img src="{{asset('images/'.$postRandom->slug.'.jpg')}}" style="width: 100%; height: 100px" alt="">
                        <div class="d-flex position-absolute" style="top: 0; max-width:200px">
                            @foreach ($postRandom->tag as $randPostTag)
                            <a href="#" class="badge badge-primary mr-2" style="block">#{{$randPostTag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h6 class="card-title mb-2"><a href="{{route('front.post_detail', $postRandom->title)}}" class="text-dark text-title">{{$postRandom->title}}</a></h6>
                        <small class="small text-muted">{{$postRandom->created_at}}
                            <span class="px-2">-</span>
                            <a href="{{route('front.post_detail', $postRandom->title)}}" class="text-muted">{{count($postRandom->comment)}} Comment</a>
                        </small>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
