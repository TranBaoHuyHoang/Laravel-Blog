<section>
    <div class="feature-posts">
        <a href="single-post.html" class="feature-post-item">
            <span>All Features</span>
        </a>
        @foreach ($categories as $cat)
            <a href="{{route('front.category', $cat->slug)}}" class="feature-post-item">
                <img src="{{asset('Frontend/imgs/'.$cat->slug.'.jpg')}}" class="w-100" alt="" style="height: 200px">
                <div class="feature-post-caption">{{$cat->name}}</div>
            </a>
        @endforeach
    </div>
</section>
