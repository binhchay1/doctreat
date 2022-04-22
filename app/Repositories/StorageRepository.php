<?php

namespace App\Repositories;

use App\Models\Storage;

/**
 * Class StorageRepository.
 */
class StorageRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Storage::class;
    }

    public function addStorage(array $data)
    {
        $query = $this->model->query();

        return $query->where('product_id', $data['product_id'])
            ->update(['quantity' => $data['quantity']]);
    }

    public function getLastQuantity($productId)
    {
        $query = $this->model->query();

        return $query->where('product_id', $productId)->select('quantity')->first();
    }

    public function deleteByProductId($productId) {
        $query = $this->model->query();

        return $query->where('product_id', $productId)->delete();
    }
}
