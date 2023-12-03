<?php
namespace App\Repositories\Post;
use App\Repositories\EloquentRepository;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getPost()
    {
        return $this->_model->with('category', 'sub_category', 'user')->paginate(20);
    }

}
