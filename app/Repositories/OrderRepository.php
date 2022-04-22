<?php

namespace App\Repositories;

use App\Models\Order;

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Order::class;
    }

    public function create(array $data)
    {
        return Order::create($data);
    }

    public function getAllOrderByYear($filter = [])
    {
        $query = $this->model->query();

        $limit = isset($filter['limit']) ? (int) $filter['limit'] : config('paginate.limit-default');

        $query = $query->join('order_line', 'order_line.order_id', '=', 'order.id');

        $query = $query->join('products', 'order_line.product_id', '=', 'products.id')->join('payment', 'payment.order_id', '=', 'order.id');

        if (isset($filter['code'])) {
            $query->where('payment.payment_code', 'like', '%' . $filter['code'] . '%');
        }

        if (isset($filter['name'])) {
            $query = $query->where('payment.name_customer', 'like', '%' . $filter['name'] . '%');
        }

        if (isset($filter['address'])) {
            $query = $query->where('payment.address_customer', 'like', '%' . $filter['address'] . '%');
        }

        if (isset($filter['phone'])) {
            $query = $query->where('payment.phone_customer', 'like', '%' . $filter['phone'] . '%');
        }


        return $query->whereYear('order.created_at', '=', date('Y'))->orderBy('order.id', 'DESC')->paginate($limit);
    }

    public function updateStatus($id, $status)
    {
        $query = $this->model->query();

        return $query->where('id', $id)->update(['status' => $status]);
    }
}
