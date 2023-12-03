<?php
namespace App\Repositories\Tag;
use App\Repositories\EloquentRepository;

class TagEloquentRepository extends EloquentRepository implements TagRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Tag::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getTag()
    {
        return $this->_model->all();
    }

}
