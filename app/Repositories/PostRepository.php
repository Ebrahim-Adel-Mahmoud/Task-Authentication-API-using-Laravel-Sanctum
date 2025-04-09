<?php
namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function all()
    {
        return Post::paginate(10);
    }

    public function find($id)
    {
         $post=Post::find($id);
        if (!$post) {
            return false;
        }
        return $post;
    }


    public function create($data)
    {
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => auth()->user()->id,
        ]);

        return $post;
    }

    public function update($id, $data)
    {
        $post = Post::find($id);

        if (!$post || $post->user_id != auth()->id()) {
            return null;
        }

        $post->update([
            'title' => $data['title'] ?? $post->title,
            'content' => $data['content'] ?? $post->content,
        ]);

        return $post;
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post || $post->user_id != auth()->id()) {
            return false;
        }
        $post->delete();
        return $post;
    }
}
