@extends("Backend.layout.master")
@section('page_title','Category')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Category List</h2>
                <a href="{{route('category.create')}}" class="btn btn-success btn-md">Add</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Category Type</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Create At</th>
                            <th>Update At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1
                        @endphp
                        @foreach ($categories as $cat)
                            <tr class="text-center">
                                <td>{{$sl++}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->slug}}</td>
                                <td>{{$cat->status}}</td>
                                <td>{{$cat->created_at}}</td>
                                <td>{{$cat->created_at != $cat->updated_at ? $cat->updated_at : 'Not Update'}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('category.show', $cat->id)}}">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('category.edit', $cat->id)}}" class="mx-2">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-edit"></i>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{route('category.destroy', $cat->id)}}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
