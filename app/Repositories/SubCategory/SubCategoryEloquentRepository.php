<?php
namespace App\Repositories\SubCategory;

use App\Repositories\EloquentRepository;

class SubCategoryEloquentRepository extends EloquentRepository implements SubCategoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\SubCategory::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getSubCategory()
    {
        return $this->_model->all();
    }

    public function createSubCategory($request)
    {
        $subCategory = new $this->_model;
        $subCategory->fill($request->all());
        $subCategory->save();
    }

    public function updateSubCategory($request, $subCategory)
    {
        $subCategory->update($request->all());
    }

    public function getSubCategoryByID($id)
    {
        $this->_model->where('category_id', $id)->get();
    }

}
