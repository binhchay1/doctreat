<?php

namespace App\Repositories;

use App\Models\StorageHistory;
use Illuminate\Support\Facades\Auth;

/**
 * Class StorageHistoryRepository.
 */
class StorageHistoryRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return StorageHistory::class;
    }

    public function getListHistory($export = 0)
    {
        $query = $this->model->query();

        if ($export == 1) {
            return $query->with('productClone')->orderBy('id', 'DESC')->get();
        }

        $limit = isset($filter['limit']) ? (int) $filter['limit'] : config('paginate.limit-default');

        if (Auth::user()->role == 1) {
            return $query->with('productClone')->orderBy('id', 'DESC')->paginate($limit);
        } else {
            return $query->with('productClone')->orderBy('id', 'DESC')->where('employee_id', Auth::user()->id)->paginate($limit);
        }
    }

    public function updateStatus($id, $status)
    {
        $query = $this->model->query();

        return $query->where('id', $id)->update(['status' => $status]);
    }

    public function updateStatusByProductId($id, $status) {
        $query = $this->model->query();

        return $query->where('product_id', $id)->where('status', \App\Enums\StatusStorage::PENDING)->update(['status' => $status]);
    }
}
