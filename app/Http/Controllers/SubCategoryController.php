<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Repositories\SubCategory\SubCategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class SubCategoryController extends Controller
{
    public $subCategoryRepository, $categoryRepository;

    public function __construct(SubCategoryRepositoryInterface $subCategoryRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategory = $this->subCategoryRepository->getSubCategory();
        return view("Backend.modules.sub_category.index", ['subCategory' => $subCategory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->getCategory();
        return view('Backend.modules.sub_category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->subCategoryRepository->createSubCategory($request);
        return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        return view("Backend.modules.sub_category.show", ['subCategory' => $subCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = $this->categoryRepository->getCategory();
        return view("Backend.modules.sub_category.edit", ['subCategory' => $subCategory, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->subCategoryRepository->updateSubCategory($request, $subCategory);
        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return back();
    }

    public function getSubCategoryByCategoryId(int $id){
        $subCategories =  $this->subCategoryRepository->getSubCategoryByID($id);
        return response()->json($subCategories);
    }


}
