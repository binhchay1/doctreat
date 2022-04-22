<?php

namespace App\Repositories;

use App\Models\ProductClone;

/**
 * Class ProductCloneRepository.
 */
class ProductCloneRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductClone::class;
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
}
