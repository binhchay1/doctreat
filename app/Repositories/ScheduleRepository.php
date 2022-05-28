<?php

namespace App\Repositories;

use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

/**
 * Class ScheduleRepository.
 */
class ScheduleRepository extends BaseRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Schedule::class;
    }

    public function create(array $data)
    {
        return Schedule::create($data);
    }

    public function getScheduleByDateAndDoctor($doctor_id, $date)
    {
        $query = $this->model->query();

        return $query->where('date', $date)->where('doctor_id', $doctor_id)->get();
    }

    public function getScheduleByAdmin() {
        $query = $this->model->query();

        return $query->get();
    }

    public function getScheduleByDoctor() {
        $query = $this->model->query();

        return $query->where('doctor_id', Auth::user()->id)->get();
    }

    public function getScheduleById($id) {
        $query = $this->model->query();

        return $query->where('id', $id)->first();
    }

    public function updateStatus($id, $status)
    {
        $query = $this->model->query();

        return $query->where('id', $id)->update(['status' => $status]);
    }

    public function getAllScheduleInMonth() {
        $query = $this->model->query();

        return $query->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
    }

    public function getScheduleByDoctorInDay() {
        $query = $this->model->query();

        return $query->with('user')->where('doctor_id', Auth::user()->id)->where('status', '!=', \App\Enums\StatusSchedule::DOCTOR)->whereDate('date', date('Y-m-d'))->get();
    }

    public function getScheduleByDoctorIdAndDate($doctor_id, $date) {
        $query = $this->model->query();

        return $query->with('user')->where('doctor_id', $doctor_id)->whereDate('date', $date)->get();
    }

    public function getLastScheduleByTime() {
        $query = $this->model->query();

        return $query->orderBy('created_at', 'desc')->first();
    }
}
