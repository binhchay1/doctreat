<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Schedule;
use DateTime;
use DatePeriod;
use DateInterval;
use stdClass;

class ScheduleController extends Controller
{
    private ScheduleRepository $scheduleRepository;
    private UserRepository $userRepository;
    const START_TIME = '09:00';
    const END_TIME = '21:00';

    public function __construct(
        ScheduleRepository $scheduleRepository,
        UserRepository $userRepository
    ) {
        $this->scheduleRepository = $scheduleRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        if (Auth::user()->role == \App\Enums\Role::ADMIN) {
            $schedule = $this->scheduleRepository->getScheduleByAdmin();
        } else {
            $schedule = $this->scheduleRepository->getScheduleByDoctor();
        }

        $data = [];
        foreach ($schedule as $item) {
            $calendar = new stdClass();
            $getName = $this->userRepository->getById($item->customer_id);
            $dateTime = explode('-', $item->date);
            $timers = explode(':', $item->hours);
            $year = $dateTime[0];
            $month = $dateTime[1] - 1;
            $day = $dateTime[2];
            $hours = $timers[0];
            $minutes = $timers[1];

            if ($month == 1) {
                $year = (int) $year - 1;
            }

            $calendar->title = $getName->name;
            $calendar->start = [
                'year' => $year,
                'month' => $month,
                'day' => $day,
                'hours' => $hours,
                'minutes' => $minutes
            ];
            $calendar->allDay = false;
            $calendar->backgroundColor = $this->random_color();
            $calendar->borderColor = $this->random_color();
            $calendar->id = $item->id;

            $data[] = $calendar;
        }

        return view('admin.schedule.index', compact('data'));
    }

    public function viewSchedule(Request $request)
    {
        $doctors = $this->userRepository->getDoctorList();
        $timers = [];
        if (!$doctors->isEmpty()) {
            $doctor_id = $doctors[0]->id;
            if (isset($request->doctor_id)) {
                $doctor_id = $request->doctor_id;
            }
            $schedules = $this->scheduleRepository->getScheduleByCurrentDateAndDoctor($doctors[0]->id);

            $hours = new DatePeriod(
                new DateTime(self::START_TIME),
                new DateInterval('PT1H'),
                new DateTime(self::END_TIME)
            );

            if (!$schedules->isEmpty()) {
                foreach ($hours as $hour) {
                    foreach ($schedules as $schedule) {
                        if ($schedule->hours == $hour->format("H:i")) {
                            continue 2;
                        }
                        if (strtotime($hour->format("H:i")) <= strtotime(date("H:i"))) {
                            continue 2;
                        }
                        $timers[] = $hour->format("H:i");
                    }
                }
            } else {
                foreach ($hours as $hour) {
                    if (strtotime($hour->format("H:i")) <= strtotime(date("H:i"))) {
                        continue;
                    }
                    $timers[] = $hour->format("H:i");
                }
            }
        }

        return view('pages.schedule', compact('doctors', 'timers'));
    }

    public function bookSchedule(Request $request)
    {
        $data = [
            'doctor_id' => $request->doctor_id,
            'customer_id' => Auth::user()->id,
            'date' => $request->date,
            'hours' => $request->hours,
        ];

        if (isset($request->note)) {
            $data['note'] = $request->note;
        }

        $schedule = $this->scheduleRepository->create($data);

        if ($schedule instanceof Schedule) {
            session()->flash('success', 'Lên lịch thành công!');

            return redirect()->route('schedule.confirmed');
        }
    }

    public function viewScheduleConfirmed()
    {
        return view('pages.schedule-confirmed');
    }

    public function editStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        $edit_status = $this->scheduleRepository->updateStatus($id, $status);
        $schedule = $this->scheduleRepository->getScheduleById($id);
        $customer = $this->userRepository->getById($schedule->customer_id);
        $doctor = $this->userRepository->getById($schedule->doctor_id);

        if ($edit_status == 1) {
            alert()->success('Thành công!', 'Duyệt lịch thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Duyệt lịch lỗi!');
        }

        return redirect()->route('mail.schedule', ['email' => $customer->email, 'status' => $status, 'hours' => $schedule->hours, 'date' => $schedule->date, 'doctor' => $doctor->name]);
    }

    public function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    public function random_color()
    {
        return '#' . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }
}
