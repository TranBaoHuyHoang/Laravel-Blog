@extends("Backend.layout.master")
@section('page_title','Tag')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tag Create
                </div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="POST" action="{{route('tag.store')}}">
                        @csrf
                        <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input type="text" class="form-control my-2" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                        @error('name')
                            <div class="text-danger">{{ $name }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control my-2" id="slug" placeholder="Slug">
                        @error('slug')
                            <div class="text-danger">{{ $slug }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="orderby">Order By</label>
                        <input type="number" name="order_by" class="form-control my-2" id="orderby" placeholder="Order By">
                        @error('order_by')
                            <div class="text-danger">{{ $order_by }}</div>
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
