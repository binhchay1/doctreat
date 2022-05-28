<?php

namespace App\Repositories;

use App\Models\Service;

/**
 * Class ServiceRepository.
 */
class ServiceRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Service::class;
    }

    public function create(array $data)
    {
        return Service::create($data);
    }

    public function getListService($filter = [])
    {
        $query = $this->model->query();

        $limit = isset($filter['limit']) ? (int) $filter['limit'] : config('paginate.limit-default');

        $query = $query->with(['user' => function ($query) use ($filter) {
            if (isset($filter['doctor'])) {
                return $query->where('name', 'like', '%' . $filter['doctor'] . '%');
            }
        }]);

        if (isset($filter['name'])) {
            $query = $query->where('name', 'like', '%' . $filter['name'] . '%');
        }

        $query = $query->orderBy('id', 'DESC');

        return $query->paginate($limit);
    }

    public function getAllServiceWithDoctor()
    {
        $query = $this->model->query();

        return $query->with('user')->get();
    }
}
