<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\PostService;


class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->getPost();
        return view("Backend.modules.post.index",[ 'posts'=> $posts ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->postService->getCategory();
        $sub_categories = $this->postService->getSubCategory();
        $tags = $this->postService->getTag();
        return view('Backend.modules.post.create', ['categories' => $categories, 'sub_categories'=> $sub_categories, 'tags'=> $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->postService->PostCreate($request);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = Post::with('category', 'sub_category', 'user', 'tag')->paginate(20);
        return view("Backend.modules.post.show", ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = $this->postService->getCategory();
        $sub_categories = $this->postService->getSubCategory();
        $tags = $this->postService->getTag();
        $select_Tags = DB::table('post_tag')->where('post_id',$post->id)->pluck('tag_id')->toArray();
        return view("Backend.modules.post.edit", ['post' => $post, 'categories' => $categories, 'sub_categories'=> $sub_categories, 'tags' => $tags, 'select_Tags' => $select_Tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->postService->PostUpdate($request, $post);
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }

    public function postList()
    {
        $posts = $this->postService->getPost();
        return $posts;
    }

}
