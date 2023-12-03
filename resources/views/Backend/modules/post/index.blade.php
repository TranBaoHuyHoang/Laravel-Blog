@extends("Backend.layout.master")
@section('page_title','Post')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Post List</h2>
                <a href="{{route('post.create')}}" class="btn btn-success btn-md">Add</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table id="datatablesSimple" class="post-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>
                                <p>Title</p>
                                <p>Slug</p>
                            </th>
                            <th>
                                <p>Category</p>
                                <p>Sub Category</p>
                            </th>
                            <th>
                                <p>Status</p>
                                <p>Is Approved</p>
                            </th>
                            <th>Photo</th>
                            <th>Tags</th>
                            <th>
                                <p>Created At</p>
                                <p>Update At</p>
                                <p>Created By</p>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1
                        @endphp
                        @foreach ($posts as $post)
                            <tr class="text-center">
                                <td>{{$sl++}}</td>
                                <td>
                                    <p>{{$post->title}}</p>
                                    <hr>
                                    <p>{{$post->slug}}</p>
                                </td>
                                <td>
                                    <p>{{$post->category->name}}</p>
                                    <hr>
                                    <p>{{$post->sub_category->name}}</p>
                                </td>
                                <td>
                                    <p>{{$post->status == 1 ? "Public" : "Not Public"}}</p>
                                    <hr>
                                    <p>{{$post->is_approved == 1 ? "Approve" : "Not Approve"}}</p>
                                </td>
                                <td>
                                    <img src="{{url('images/'.$post->photo)}}" alt="{{$post->slug}}">
                                </td>
                                <td>
                                    @foreach ($post->tag as $tag)
                                        <button class="btn btn-info btn-sm mb-1">{{$tag->name}}</button>
                                    @endforeach
                                </td>
                                <td>
                                    <p>{{$post->created_at->toDayDateTimeString()}}</p>
                                    <hr>
                                    <p>{{$post->created_at == $post->updated_at ? "Not Update" : $post->updated_at->toDayDateTimeString()}}</p>
                                    <hr>
                                    <p>{{$post->user->name}}</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('post.show', $post->id)}}">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('post.edit', $post->id)}}" class="mx-2">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-edit"></i>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{route('post.destroy', $post->id)}}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="postmit" class="btn btn-warning btn-sm">
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
