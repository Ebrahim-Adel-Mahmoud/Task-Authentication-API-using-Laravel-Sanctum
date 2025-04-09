<?php
namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    public function __construct(private PostRepository $postRepository) {}

    public function all()
    {
        return $this->postRepository->all();
    }

    public function find($id)
    {
        return $this->postRepository->find($id);
    }

    public function create($data)
    {
        return $this->postRepository->create($data);
    }

    public function update($id, $data)
    {
       $post= $this->postRepository->update($id, $data);
        return $post;
    }


    public function delete($id)
    {
        return $this->postRepository->delete($id);
    }

}
