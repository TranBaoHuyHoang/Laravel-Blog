@extends("Backend.layout.master")
@section('page_title','Tag')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Tag List</h2>
                <a href="{{route('tag.create')}}" class="btn btn-success btn-md">Add</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>STT</th>
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
                        @foreach ($tags as $tag)
                            <tr class="text-center">
                                <td>{{$sl++}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug}}</td>
                                <td>{{$tag->status}}</td>
                                <td>{{$tag->created_at}}</td>
                                <td>{{$tag->created_at != $tag->updated_at ? $tag->updated_at : 'Not Update'}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('tag.show', $tag->id)}}">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('tag.edit', $tag->id)}}" class="mx-2">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-edit"></i>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{route('tag.destroy', $tag->id)}}">
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
