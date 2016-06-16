<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Http\Requests\AdminCategoryRequest;


class CategoriesController extends Controller
{


    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {

        $categories = $this->repository->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.categories.index');
    }
}
