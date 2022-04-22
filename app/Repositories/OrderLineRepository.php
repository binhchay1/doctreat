<?php

namespace App\Repositories;

use App\Models\OrderLine;

/**
 * Class OrderLineRepository.
 */
class OrderLineRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return OrderLine::class;
    }

    public function create(array $data)
    {
        return OrderLine::create($data);
    }

    public function getAllByProductId($id) {
        $query = $this->model->query();

        return $query->where('product_id', $id)->get();
    }

    public function getAllByProductIdInMonth($id) {
        $query = $this->model->query();

        return $query->where('product_id', $id)->whereMonth('created_at', date('m'))->get();
    }

    public function getOrderLineByOrder($id) {
        $query = $this->model->query();

        return $query->where('order_id', $id)->get();
    }
}
