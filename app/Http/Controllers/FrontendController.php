<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index() {
        $firstPost = Post::with('category', 'sub_category', 'tag')->first();
        $latestPost = Post::with('category', 'sub_category', 'tag')->where('id', '>', $firstPost->id)->inRandomOrder()->limit(6)->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('Frontend.modules.index', ['latestPost' => $latestPost, 'categories' => $categories, 'firstPost' => $firstPost, 'tags' => $tags]);
    }

    public function post_detail($slug) {
        $firstPost = Post::with('category', 'sub_category', 'tag')->first();
        $latestPost = Post::with('category', 'sub_category', 'tag')->where('id', '>', $firstPost->id)->inRandomOrder()->limit(6)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::with('category', 'sub_category', 'tag', 'comment', 'comment.user')->where('title', $slug)->first();
        $postRelates = Post::with('category', 'sub_category', 'tag', 'comment', 'comment.user')->where('category_id', $post->category_id)->limit(3)->get();
        return view('Frontend.modules.postDetail', ['firstPost'=> $firstPost,'latestPost' => $latestPost ,'post' => $post, 'categories' => $categories, 'tags' => $tags, 'postRelates' => $postRelates]);

    }

    public function category($slug) {
        $firstPost = Post::with('category', 'sub_category', 'tag')->first();
        $latestPost = Post::with('category', 'sub_category', 'tag')->where('id', '>', $firstPost->id)->inRandomOrder()->limit(6)->get();
        $categories = Category::where('slug', $slug)->first();
        $tags = Tag::all();
        if ($categories) {
            $posts = Post::with('category', 'sub_category', 'tag')
            ->where('category_id', $categories->id)
            ->latest()
            ->paginate(5);
            return view('Frontend.modules.template', ['firstPost'=> $firstPost,'latestPost' => $latestPost ,'posts' => $posts, 'categories' => $categories, 'tags'=> $tags]);
        }

    }

    public function all_post() {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::with('category', 'sub_category', 'tag')->paginate(3);
        return view('Frontend.modules.template', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }

    public function search(Request $request) {
        $tags = Tag::all();
        $posts = Post::with('category', 'sub_category', 'tag')
        ->where('title', 'like', '%'.$request->search.'%')
        ->latest()
        ->paginate(5);
        return view('Frontend.modules.template', ['posts' => $posts, 'tags' => $tags]);
    }

    public function tag($slug) {
        $firstPost = Post::with('category', 'sub_category', 'tag')->first();
        $latestPost = Post::with('category', 'sub_category', 'tag')->where('id', '>', $firstPost->id)->inRandomOrder()->limit(6)->get();
        $tags = Tag::all();
        $tag = Tag::where('slug', $slug)->first();
        $post_ids = DB::table('post_tag')->where('tag_id', $tag->id)->pluck('post_id');
        if ($tag) {
            $posts = Post::with('category', 'sub_category', 'tag')
            ->whereIn('id', $post_ids)
            ->latest()
            ->paginate(5);
        }
        return view('Frontend.modules.template', ['posts' => $posts, 'tags' => $tags, 'latestPost' => $latestPost, 'firstPost' => $firstPost]);
    }

    public function login() {
        return view('Frontend.modules.login');
    }

    public function register() {
        return view('Frontend.modules.register');
    }

    public function Userregister(Request $request) {
        $request->merge(['password'=>Hash::make($request->password)]);
        try {
            User::create($request->all());
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('front.login');
    }

    public function Userlogin(Request $request) {
        if (Auth::attempt(['email' =>$request->email, 'password' => $request->password])) {
            return redirect()->route('front.index');
        }
        return back()->with('message', 'Your Email or Password not correct');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('front.index');
    }

    public function contact() {
        $firstPost = Post::with('category', 'sub_category', 'tag')->first();
        $latestPost = Post::with('category', 'sub_category', 'tag')->where('id', '>', $firstPost->id)->inRandomOrder()->limit(6)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('Frontend.modules.contact', ['categories' =>$categories, 'tags' => $tags, 'firstPost'=> $firstPost,'latestPost' => $latestPost ]);
    }

}
