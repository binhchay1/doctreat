<?php

namespace App\Repositories;

use App\Models\CancelSchedule;

/**
 * Class CancelScheduleRepository.
 */
class CancelScheduleRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return CancelSchedule::class;
    }

    public function create(array $data)
    {
        return CancelSchedule::create($data);
    }

    public function getCancelScheduleById($id) {
        $query = $this->model->query();

        return $query->where('id', $id)->first();
    }

    public function getCancelScheduleByDate($date) {
        $query = $this->model->query();

        return $query->where('date', $date)->get();
    }

    public function getCancelScheduleByDateAndDoctor($date, $doctor_id) {
        $query = $this->model->query();

        return $query->where('date', $date)->where('users_id', $doctor_id)->get();
    }

    public function checkStatusHoursByDate($date, $hours) {
        $query = $this->model->query();

        $query = $query->where('date', $date)->where('hours', $hours->format('H:i'))->first();

        if($query != null) {
            return true;
        }

        return false;
    }

    public function getCancelScheduleByDoctor($id) {
        $query = $this->model->query();

        return $query->where('users_id', $id)->get();
    }
}
