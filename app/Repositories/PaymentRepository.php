<?php

namespace App\Repositories;

use App\Models\Payment;

/**
 * Class PaymentRepository.
 */
class PaymentRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Payment::class;
    }

    public function create(array $data)
    {
        return Payment::create($data);
    }

    public function getPaymentById($paymentid) {
        $query = $this->model->query();

        return $query->where('id', $paymentid)->first();
    }

    public function getPaymentByCode($code) {
        $query = $this->model->query();

        return $query->where('payment_code', $code)->first();
    }

    public function update($id, $status) {
        $query = $this->model->query();

        return $query->where('id', $id)->update(['status_payment' => $status]);
    }

    public function getPriceByCurrentYear() {
        $query = $this->model->query();

        return $query->whereYear('created_at', date('Y'))->where('status_payment', 'like', '%Thành công%')->get();
    }

    public function getPriceByEachMonth($month) {
        $query = $this->model->query();

        return $query->whereYear('created_at', date('Y'))->whereMonth('created_at', $month)->where('status_payment', 'like', '%Thành công%')->get();
    }

    public function getPaymentByUsersId($id) {
        $query = $this->model->query();

        return $query->where('users_id', $id)->where('status_payment', 'like', '%Thành công%')->get();
    }

    public function countTotalBuy($id) {
        $query = $this->model->query();

        return $query->where('users_id', $id)->where('status_payment', 'like', '%Thành công%')->count();
    }
}
