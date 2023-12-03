@extends("Backend.layout.master")
@section('page_title','Tag Detail')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tag Detail
                </div>
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input disabled value="{{$tag->name}}" class="form-control my-2">
                        </div>
                        <div class="form-group">
                        <label for="slug">Slug</label>
                        <input disabled value="{{$tag->slug}}" class="form-control my-2" >
                        </div>
                        <div class="form-group">
                        <label for="orderby">Order By</label>
                        <input disabled value="{{$tag->order_by}}" class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <label for="orderby">Status</label>
                            @if ($tag->status == 1)
                                <input disabled value="Active" class="form-control my-2">
                            @else
                                <input disabled value="Deactive" class="form-control my-2">
                            @endif
                        </div>
                        <a href="{{route('tag.index')}}" class="btn btn-primary mt-2">Back</a>
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
