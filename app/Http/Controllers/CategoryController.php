<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategory;
use App\Http\Requests\EditCategory;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\PostRepository;

class CategoryController extends Controller
{
    private $categoryRepository;
    private $postRepository;

    public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategory $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        $input = $request->all();
        $this->categoryRepository->create($input);

        return redirect()->back()->with('status', trans('categories_create.status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = $this->postRepository->where('category_id', $id)->paginate();
        $category = $this->categoryRepository->findOrFail($id);
        $name = $category->name;
        return view('front.single', compact('posts', 'name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditCategory $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategory $request, $id)
    {
        $this->categoryRepository->update($request, $id);
        return redirect()->back()->with('status', trans('categories_edit.status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
        return redirect()->back()->with('status', trans('categories_destroy.status'));
    }
}
