<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\CupomRepository;


class CupomsController extends Controller
{


    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $cupoms = $this->repository->paginate();
        return view('admin.cupoms.index', compact('cupoms'));
    }

    /**
     * @return mixed
     */
    public function create(){
        return view('admin.cupoms.create');
    }

    /**
     * @param AdminCupomRequest $request
     * @return mixed
     */
    public function store(AdminCupomRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('admin.cupoms.index');
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $cupom = $this->repository->find($id);
        return view('admin.cupoms.edit', compact('cupom'));
    }

    public function update(AdminCupomRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('admin.cupoms.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.cupoms.index');
    }
}
