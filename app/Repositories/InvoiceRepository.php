<?php

namespace App\Repositories;

use App\Models\Invoice;

/**
 * Class InvoiceRepository.
 */
class InvoiceRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Invoice::class;
    }

    public function create(array $data)
    {
        return Invoice::create($data);
    }

    public function getInvoiceByPaymentCode($payment_code) {
        $query = $this->model->query();

        return $query->where('payment_code', $payment_code)->first();
    }
}
