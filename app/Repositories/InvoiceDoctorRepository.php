<?php

namespace App\Repositories;

use App\Models\InvoiceDoctor;

/**
 * Class InvoiceDoctorRepository.
 */
class InvoiceDoctorRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return InvoiceDoctor::class;
    }

    public function create(array $data)
    {
        return InvoiceDoctor::create($data);
    }

    public function getInvoiceCode($code)
    {
        $query = $this->model->query();

        return $query->where('invoice_code', $code)->first();
    }

    public function getListDoctorWithInvoice()
    {
        $query = $this->model->query();

        return $query->select('doctor_id')->groupBy('doctor_id')->get();
    }

    public function getInvoiceByDoctor($type, $date, $doctor_id)
    {
        $query = $this->model->query();

        if ($type == 'month') {
            $query = $query->whereMonth('created_at', $date);
        }

        if ($type == 'year') {
            $query = $query->whereYear('created_at', $date);
        }

        return $query->where('doctor_id', $doctor_id)->get();
    }
}
