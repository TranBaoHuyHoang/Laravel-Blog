<?php
namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use GuzzleHttp\Psr7\Request;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getCategory()
    {
        return $this->_model->all();
    }

    public function createCategory($request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'lowercase', 'max:255', 'unique:categories'],
            'order_by' => ['required', 'numeric'],
            'status' => ['required'],
        ]);

        $category = new $this->_model;
        $category->fill($request->all());
        $category->save();
    }

    public function updateCategory($request, $category)
    {
        $category->update($request->all());
    }


}
