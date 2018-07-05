<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\PostRepository;

class PageController extends Controller
{
    private $postRepository;
    private $categoryRepository;

    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();
        $posts = $this->postRepository->paginate(5);
        return view('front.index', compact('posts', 'categories'));
    }

    public function search(Search $request)
    {
        $name = $request->input('keyword');
        $posts = $this->postRepository->search($request);
        //dd($posts);
        return view('front.single', compact('posts', 'name'));
    }
}
