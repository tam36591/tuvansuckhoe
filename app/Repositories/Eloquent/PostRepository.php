<?php
/**
 * Created by PhpStorm.
 * User: minhphuc429
 * Date: 7/1/18
 * Time: 12:06
 */

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostRepository extends BaseRepository
{
    /**
     * Specify Model class name
     */
    function model()
    {
        return 'App\Models\Post';
    }

    public function create($request)
    {
        $post = new $this->model;
        $post->user_id = Auth::id();
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->description = $request->input('description');
        $post->thumbnail = $request->file('thumbnail')->store('public/images');
        $post->save();
        $post->tags()->sync($request->tags, false);
    }

    public function updatePost($request, $id)
    {
        $post = $this->model->findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->content = $request->input('content');
        if ($request->file('thumbnail')) {
            Storage::delete($post->thumbnail);
            $post->thumbnail = $request->file('thumbnail')->store('public/images');
        }
        $post->save();
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }
    }

    public function destroyPost($id)
    {
        $post = $this->model->findOrFail($id);
        $post->tags()->detach();
        $post->delete();
    }

    public function search($request)
    {
        if ($request->input('keyword') == '')
            return $this->model->orderBy('id', 'DESC')->paginate(15);
        else {
            $keyword = $request->input('keyword');
            $posts = $this->model->where('title', 'like', "%$keyword%")
                ->orWhere('description', 'like', "%$keyword%")
                ->orWhere('content', 'like', "%$keyword%")
                ->paginate(5);
            $posts->appends($request->only('keyword'))->links();
            return $posts;
        }
    }
}