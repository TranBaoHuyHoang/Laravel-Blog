@extends("Backend.layout.master")
@section('page_title','Post Detail')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Post Detail
                </div>
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="form-group">
                        <label for="name">Post Title</label>
                        <input disabled value="{{$post->title}}" class="form-control my-2">
                        </div>
                        <div class="form-group">
                        <label for="slug">Slug</label>
                        <input disabled value="{{$post->slug}}" class="form-control my-2" >
                        </div>
                        <div class="form-group">
                            <label for="orderby">Status</label>
                            @if ($post->status == 1)
                                <input disabled value="Active" class="form-control my-2">
                            @else
                                <input disabled value="Deactive" class="form-control my-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="orderby">Approve</label>
                            @if ($post->status == 1)
                                <input disabled value="Approve" class="form-control my-2">
                            @else
                                <input disabled value="Approve" class="form-control my-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="slug">Category</label>
                            <input disabled value="{{$post->category->name}}" class="form-control my-2" >
                        </div>
                        <div class="form-group">
                            <label for="slug">Sub Category</label>
                            <input disabled value="{{$post->sub_category->name}}" class="form-control my-2" >
                        </div>
                        <div class="form-group">
                            <label for="slug">Desciption</label>
                            <input disabled value="{{$post->description}}" class="form-control my-2" >
                        </div>
                        <div class="form-group  my-4">
                            <label for="slug">Image</label>
                            <img style="width: 240px;" class="form-control" src="{{url('images/'.$post->photo)}}" alt="{{$post->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Tag</label>
                            <div class="form-control">
                                @foreach ( $post->tag as $tag)
                                    <button class="btn btn-sm btn-info">{{$tag->name}}</button>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug">Admin Comment</label>
                            <input disabled
                            value="@if ($post->admin_comment == "")Admin no comment
                            @else
                                {{$post->admin_comment}}
                            @endif
                            "
                            class="form-control my-2" >
                        </div>
                        <div class="form-group">
                            <label for="slug">Create At</label>
                            <input disabled value="{{$post->created_at}}" class="form-control my-2" >
                        </div>
                        <div class="form-group">
                            <label for="slug">Update At</label>
                            <input disabled value="{{$post->updated_at}}" class="form-control my-2" >
                        </div>
                        <a href="{{route('post.index')}}" class="btn btn-primary mt-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let nameElement = document.querySelector("#name");
        let slugElement = document.querySelector("#slug");
        nameElement.addEventListener("change",function() {
            name = nameElement.value;
            let slug = name.replaceAll(' ', '-');
            slugElement.value = slug.toLowerCase();
        });


    </script>

@endsection
