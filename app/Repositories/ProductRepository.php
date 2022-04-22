<?php

namespace App\Repositories;

use App\Models\Product;
use DB;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Product::class;
    }

    public function getListProduct($filter = [])
    {
        $query = $this->model->query();

        $limit = isset($filter['limit']) ? (int) $filter['limit'] : config('paginate.limit-default');

        $query->with('storage');
        if (isset($filter['name'])) {
            $query = $query->where('products.name', 'like', '%' . $filter['name'] . '%');
        }

        if (isset($filter['description'])) {
            $query = $query->where('products.description', 'like', '%' . $filter['description'] . '%');
        }

        if (isset($filter['type'])) {
            $query = $query->where('products.type', 'like', '%' . $filter['type'] . '%');
        }

        $query = $query->orderBy('id', 'DESC');

        return $query->paginate($limit);
    }

    public function getQuantityById($id)
    {
        $query = $this->model->query();

        return $query->where('id', $id)->with('storage')->first();
    }

    public function getAll()
    {
        return $this->model->query()->get();
    }

    public function saleInYear()
    {
        $query = $this->model->query();
    }

    public function getCategoriesAndCount()
    {
        $query = $this->model->query();

        return $query->select('type', DB::raw('count(*) as total'))->groupBy('type')->get();
    }

    public function getListProductWithHighToLowPrice($category = null)
    {
        $query = $this->model->query();

        $limit = isset($filter['limit']) ? (int) $filter['limit'] : config('paginate.limit-default');

        if($category != null) {
            $query = $query->where('type', 'like', '%' . $category . '%');
        }

        $query = $query->orderBy('price', 'DESC');

        return $query->paginate($limit);
    }

    public function getListProductWithLowToHighPrice($category = null)
    {
        $query = $this->model->query();

        $limit = isset($filter['limit']) ? (int) $filter['limit'] : config('paginate.limit-default');

        if($category != null) {
            $query = $query->where('type', 'like', '%' . $category . '%');
        }

        $query = $query->orderBy('price', 'ASC');

        return $query->paginate($limit);
    }

    public function getListProductWithBestSeller($category = null)
    {
        $query = $this->model->query();

        $limit = isset($filter['limit']) ? (int) $filter['limit'] : config('paginate.limit-default');

        if($category != null) {
            $query = $query->where('type', 'like', '%' . $category . '%');
        }

        $query = $query->with('orderLine');

        return $query->paginate($limit);
    }
}
