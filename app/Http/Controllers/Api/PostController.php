<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends BaseController
{

    public function __construct(private PostService $postService){}

    public function index()
    {
        $posts = $this->postService->all();
        return $this->success($posts,'Retived all posts');
    }


    public function create()
    {
        //
    }


    public function store(PostRequest $request)
    {
        $post = $this->postService->create($request->validated());
        return $this->success($post,'Post created successfully');
    }

       public function show(string $id)
    {
        $post = $this->postService->find($id);
        if(!$post){
            return $this->error('Post not found');
        }
        return $this->success($post,'show one post by ID');
    }


    public function edit(string $id)
    {
        //
    }




    public function update( UpdatePostRequest $request, string $id)
    {
       
        $post = $this->postService->update($id, $request->validated());
        if(!$post){
            return $this->error('Post not found');
        }
        return $this->success($post,'Update Post Successfully');
    }


    public function destroy(string $id)
    {
        $post = $this->postService->delete($id);
        if(!$post){
            return $this->error('Post not found');
        }
        return $this->success('','Deleted Post Successfully');
    }
}
