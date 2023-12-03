<?php
namespace App\Repositories\Tag;

interface TagRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getTag();

}
