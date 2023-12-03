<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getCategory();

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function createCategory($request);
    public function updateCategory($request, $category);

}
