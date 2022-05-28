<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @param $filters
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllUser($filters, $limit = 10)
    {
        $query = $this->model->query();

        if (isset($filters['name']))
        {
            $query = $query->where('name', 'like' , '%'. $filters['name'] .'%');
        }

        if (isset($filters['email']))
        {
            $query = $query->where('email', 'like' , '%'. $filters['email'] .'%');
        }

        if (isset($filters['phone']))
        {
            $query = $query->where('phone', 'like' , '%'. $filters['phone'] .'%');
        }

        if (isset($filters['role']))
        {
            $query->where('role', $filters['role']);
        }

        return $query->paginate($limit);
    }

    public function getDoctorList() {
        $query = $this->model->query();

        return $query->where('role', \App\Enums\Role::DOCTOR)->get();
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function deleteUser(int $userId)
    {
        return User::where('id', $userId)->delete();
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function countUsers($filters)
    {
        return User::where($filters)->count();
    }

    public function updateProfile($id, array $data) {
        $query = $this->model->query();

        return $query->where('id', $id)->update($data);
    }

    public function getNameById($id) {
        $query = $this->model->query();

        return $query->where('id', $id)->select('name')->first();
    }

    public function getUserById($id) {
        $query = $this->model->query();

        return $query->where('id', $id)->first();
    }
}
