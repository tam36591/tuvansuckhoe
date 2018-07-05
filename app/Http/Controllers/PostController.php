<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreate;
use App\Http\Requests\PostEdit;
use App\Http\Requests\Search;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\Eloquent\TagRepository;

class PostController extends Controller
{
    private $postRepository;
    private $categoryRepository;
    private $tagRepository;

    public function __construct(PostRepository $postRepository,
                                CategoryRepository $categoryRepository,
                                TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tagRepository->all();
        $categories = $this->categoryRepository->all();
        return view('posts.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreate $request)
    {
        $this->postRepository->create($request);
        return redirect()->back()->with('status', 'Tạo post thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relatePosts = $this->postRepository->all()->random(3);
        $post = $this->postRepository->findOrFail($id);
        return view('posts.show', compact('post', 'relatePosts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findOrFail($id);
        $tagsData = $this->tagRepository->all();
        $cats = $this->categoryRepository->all();
        $categories = [];
        foreach ($cats as $category) {
            $categories[$category->id] = $category->name;
        }
        $tags = [];
        foreach ($tagsData as $tag) {
            $tags[$tag->id] = $tag->name;
        }

        return view('posts.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEdit $request, $id)
    {
        $this->postRepository->updatePost($request, $id);

        return redirect()->back()->with('status', 'Cập nhật post thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findOrFail($id);
        $post->delete();

        return redirect()->back()->with('status', 'Xóa post thành công');
    }
}
