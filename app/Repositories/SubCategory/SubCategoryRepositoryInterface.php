<?php
namespace App\Repositories\SubCategory;

interface SubCategoryRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getSubCategoryByID($id);
    public function getSubCategory();
    public function createSubCategory($request);
    public function updateSubCategory($request, $subCategory);

}
