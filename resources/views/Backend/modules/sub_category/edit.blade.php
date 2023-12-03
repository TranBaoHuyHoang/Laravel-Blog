@extends("Backend.layout.master")
@section('page_title','Sub-Category')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Sub-Category Edit
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('sub-category.update', ['sub_category'=> $subCategory])}}">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                        <label for="name">Sub Category Name</label>
                        <input type="text" value="{{$subCategory->name}}" class="form-control my-2" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                        @error('name')
                            <div class="text-danger">{{ $subCategory->name }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" value="{{$subCategory->slug}}" class="form-control my-2" id="slug" placeholder="Slug">
                        @error('slug')
                            <div class="text-danger">{{ $subCategory->slug }}</div>
                        @enderror
                        </div>

                        <div class="input-group my-4">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Category Type</label>
                            </div>
                            @error('category_id')
                                <div class="text-danger">{{ $subCategory->category_id }}</div>
                            @enderror
                            <select name="category_id" class="custom-select" id="inputGroupSelect01">
                                @foreach ($categories as $cat)
                                    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                          </div>

                        <div class="form-group">
                        <label for="orderby">Order By</label>
                        <input type="number" name="order_by" class="form-control my-2" id="orderby" placeholder="Order By">
                        @error('order_by')
                            <div class="text-danger">{{ $subCategory->order_by }}</div>
                        @enderror
                        </div>
                        <div class="input-group my-4">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Status Select</label>
                            </div>
                            @error('status')
                                <div class="text-danger">{{ $subCategory->status }}</div>
                            @enderror
                            <select name="status" class="custom-select" id="inputGroupSelect01">
                              <option selected>Choose...</option>
                              <option value="1">Active</option>
                              <option value="0">Deactive</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
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
