<div class="page-sidebar text-center">
    <h6 class="sidebar-title section-title mb-4 mt-3">About</h6>
    <img src="{{asset('Frontend/imgs/avatar.jpg')}}" alt="" class="circle-100 mb-3">
    <div class="socials mb-3 mt-2">
        <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
        <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
        <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
        <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
        <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
    </div>
    <p>"You build on failure. You use it as a stepping stone. Close the door on the past. You don't try to forget the mistakes, but you don't dwell on it. You don't let it have any of your energy, or any of your time, or any of your space." <span class="text-custom"> Johnny Cash</span></p>


    <h6 class="sidebar-title mt-5 mb-4">Search</h6>
    <form action="{{route('front.search')}}" method="GET">
        @csrf
        <div class="subscribe-wrapper">
            <input type="text" name="search" class="form-control" placeholder="Type To Search">
            <button type="submit" class="btn btn-primary"><i class="ti-location-arrow"></i></button>
        </div>
    </form>

    <h6 class="sidebar-title mt-5 mb-4">Tags</h6>
    @foreach ($tags as $tag)
        <a href="{{route('front.tag', $tag->name)}}" class="badge badge-primary m-1">#{{$tag->name}}</a>
    @endforeach

    <h6 class="sidebar-title mt-5 mb-4">Popular Posts</h6>

    @foreach ($latestPost as $val)
    <div class="media text-left mb-2">
        <a href="{{route('front.post_detail', $val->title)}}" class="overlay-link"></a>
        <img class="mr-3" src="{{asset('images/'.$val->slug.'.jpg')}}" width="100px" alt="Generic placeholder image">
        <div class="media-body">
            <h6 class="mt-0 text-title">{{$val->title}}</h6>
            <p class="mb-2 text-description"> {{$val->sub_description}}</p>
            <p class="text-muted small"><i class="ti-calendar pr-1"></i>{{$val->created_at}}</p>
        </div>
    </div>
    @endforeach


</div>
