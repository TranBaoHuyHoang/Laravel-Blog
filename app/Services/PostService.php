<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\SubCategory\SubCategoryRepositoryInterface;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $postRepository;
    protected $categoryRepository;
    protected $subCategoryRepository;
    protected $tagRepository;

    public function __construct(PostRepositoryInterface $postRepository,
    CategoryRepositoryInterface $categoryRepository,
    TagRepositoryInterface $tagRepository,
    SubCategoryRepositoryInterface $subCategoryRepository,
    )

    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->subCategoryRepository = $subCategoryRepository;

    }

    public function getPost(){
        $posts = $this->postRepository->getPost();
        return $posts;
    }

    public function PostCreate(Request $request){
        $post_data = $request->except(['tags_id', 'slug', 'photo']);
        $post_data['slug'] = $request->slug;
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $post_data['slug'].'.'.$image->getClientOriginalExtension();
            $path = public_path('images/');
            $request->photo->move($path, $filename);
            $post_data['photo'] = $filename;
        }

        $post = $this->postRepository->getModel()::create($post_data);
        $post->tag()->attach($request->tags_id);

    }


    public function PostUpdate($request, $post){
        $post_data = $request->except(['tags_id', 'slug', 'photo']);
        $post_data['slug'] = $request->slug;
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $post_data['slug'] . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/');
            // $imageOld_path = $path.$post->photo;
            // unlink($imageOld_path);
            $request->photo->move($path, $filename);
            $post_data['photo'] = $filename;
        }
        $post->update($post_data);
        $post->tag()->sync($request->tags_id);

    }

    public function getCategory(){
        $category = $this->categoryRepository->getCategory();
        return $category;
    }

    public function getSubCategory(){
        $subcategory = $this->subCategoryRepository->getSubCategory();
        return $subcategory;
    }

    public function getTag(){
        $tags = $this->tagRepository->getTag();
        return $tags;
    }

}

