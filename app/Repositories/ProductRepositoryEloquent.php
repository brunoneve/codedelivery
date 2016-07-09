<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Models\Product;
use CodeDelivery\Presenters\ProductPresenter;

/**
 * Class ProductRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{


    public function products()
    {
        return $this->model->get(['id','name','price']);
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return ProductPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
