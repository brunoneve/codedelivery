<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Http\Requests\AdminCategoryRequest;


class ProductsController extends Controller
{


    /**
     * @var ProductsController
     */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $categories = $this->repository->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return mixed
     */
    public function create(){
        return view('admin.categories.create');
    }

    /**
     * @param AdminCategoryRequest $request
     * @return mixed
     */
    public function store(AdminCategoryRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('admin.categories.index');
    }
}
