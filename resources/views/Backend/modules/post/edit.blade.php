@extends("Backend.layout.master")
@section('page_title','Post')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Post Edit
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('post.update',['post' => $post->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                        <label for="title">Post Name</label>
                        <input type="text" value="{{$post->title}}" class="form-control my-2" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter name">
                        @error('title')
                            <div class="text-danger">{{ $title }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" value="{{$post->slug}}" name="slug" class="form-control my-2" id="slug" placeholder="Slug">
                        @error('slug')
                            <div class="text-danger">{{ $slug }}</div>
                        @enderror
                        </div>
                        <div class="input-group my-4">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Status Select</label>
                            </div>
                            @error('status')
                                <div class="text-danger">{{ $status }}</div>
                            @enderror
                            <select name="status" class="custom-select" id="inputGroupSelect01">
                                @if ($post->status == 1)
                                    <option selected value="1">Active</option>
                                    <option value="0">Deactive</option>
                                @else
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                @endif
                            </select>
                          </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="input-group my-4">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Category Type</label>
                                </div>
                                @error('status')
                                    <div class="text-danger">{{ $status }}</div>
                                @enderror
                                <select id="category_id" name="category_id" class="custom-select" id="inputGroupSelect01">

                                  @foreach ($categories as $cat)
                                    @if ($cat->id == $post->category_id)
                                        <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif

                                  @endforeach
                                </select>
                              </div>

                              <div class="input-group my-4">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Sub-Category Type</label>
                                </div>
                                @error('status')
                                    <div class="text-danger">{{ $status }}</div>
                                @enderror
                                <select name="sub_category_id" id="sub_category_id" class="custom-select" id="inputGroupSelect01">
                                </select>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="sub_description">Sub Description</label>
                            <textarea class="form-control my-2" name="sub_description" id="sub_description" cols="30" rows="10">{{$post->sub_description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control my-2" name="description" id="description" cols="30" rows="30">{{$post->description}}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $slug }}</div>
                            @enderror
                            </div>
                            @push('css')
                                <style>
                                    .ck.ck-editor__main>.ck.ck-editor__editable{
                                        min-height: 250px;
                                    }
                                </style>
                            @endpush

                        <div class="form-group row my-4">
                            <label for="tag">Tags</label>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline col-md-3 my-2 mx-2">
                                    <input class="form-check-input" type="checkbox" name="tags_id[]" value="{{$tag->id}}" id="{{$tag->name}}" @if(in_array($tag->id, $select_Tags)) checked @endif>
                                    <label class="form-check-label" for="{{$tag->name}}">
                                    {{$tag->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <img src="{{url('images/'.$post->photo)}}" alt="{{$post->title}}" style="width: 300px" class="my-4">
                            <input class="form-control" name="photo" type="file" id="file">
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );

        let nameElement = document.querySelector("#title");
        let slugElement = document.querySelector("#slug");
        nameElement.addEventListener("change",function() {
            name = nameElement.value;
            let slug = name.replaceAll(' ', '-');
            slugElement.value = slug.toLowerCase();
        });

        let categoryId = document.querySelector("#category_id");
        let subcategoryId = document.querySelector("#sub_category_id");

        subcategoryId.innerHTML = ``;
        axios.get(window.location.origin+'/admin/get-subcategory/'+{{$post->category_id}})
        .then(res=>{
            let sub_categories = res.data;
            sub_categories.map((sub_category,index)=>{
                subcategoryId.innerHTML += `<option value="${sub_category.id}">${sub_category.name}</option>`;
            })
        })

        categoryId.addEventListener('change', function (param) {
            subcategoryId.innerHTML = ``;
            axios.get(window.location.origin+'/admin/get-subcategory/'+categoryId.value)
            .then(res=>{
                let sub_categories = res.data;
                sub_categories.map((sub_category,index)=>{
                    subcategoryId.innerHTML += `<option value="${sub_category.id}">${sub_category.name}</option>`;
                })
            })

        })

    </script>

@endsection
