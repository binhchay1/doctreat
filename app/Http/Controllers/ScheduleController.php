<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use App\Repositories\CancelScheduleRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\CancelSchedule;
use App\Http\Requests\ScheduleRequest;
use DateTime;
use DatePeriod;
use DateInterval;
use stdClass;

class ScheduleController extends Controller
{
    private ScheduleRepository $scheduleRepository;
    private UserRepository $userRepository;
    private CancelScheduleRepository $cancelScheduleRepository;
    const START_TIME = '08:00';
    const END_TIME = '18:00';

    public function __construct(
        ScheduleRepository $scheduleRepository,
        UserRepository $userRepository,
        CancelScheduleRepository $cancelScheduleRepository
    ) {
        $this->scheduleRepository = $scheduleRepository;
        $this->userRepository = $userRepository;
        $this->cancelScheduleRepository = $cancelScheduleRepository;
    }

    public function index()
    {
        if (Auth::user()->role == \App\Enums\Role::ADMIN) {
            $schedule = $this->scheduleRepository->getScheduleByAdmin();
        } else {
            $schedule = $this->scheduleRepository->getScheduleByDoctor();
        }

        $allTimers = new DatePeriod(
            new DateTime(self::START_TIME),
            new DateInterval('PT1H'),
            new DateTime(self::END_TIME)
        );

        $arrTime = [];
        $statusDate = 0;
        if (strtotime((new DateTime(self::END_TIME))->format('H:i')) < strtotime(date('H:i'))) {
            $statusDate = 1;
            foreach ($allTimers as $timer) {
                $tomorrow = date("Y-m-d", strtotime("+1 day"));
                $cancelScheduleCheckStatus = $this->cancelScheduleRepository->checkStatusHoursByDate($tomorrow, $timer);

                if ($cancelScheduleCheckStatus) {
                    $arrTime[] = [
                        'timer' => $timer,
                        'status' => 1,
                        'hours' => $timer->format('H:i')
                    ];
                } else {
                    $arrTime[] = [
                        'timer' => $timer,
                        'status' => 0,
                        'hours' => $timer->format('H:i')
                    ];
                }
            }
            $allTimers = $arrTime;
        } else {
            foreach ($allTimers as $timer) {
                if (strtotime($timer->format('H:i')) > strtotime(date('H:i'))) {
                    $cancelScheduleCheckStatus = $this->cancelScheduleRepository->checkStatusHoursByDate(date('Y-m-d'), $timer);
                    if ($cancelScheduleCheckStatus) {
                        $arrTime[] = [
                            'timer' => $timer,
                            'status' => 1,
                            'hours' => $timer->format('H:i')
                        ];
                    } else {
                        $arrTime[] = [
                            'timer' => $timer,
                            'status' => 0,
                            'hours' => $timer->format('H:i')
                        ];
                    }
                }
            }
            $allTimers = $arrTime;
        }

        $data = [];
        $cancelSchedule = $this->cancelScheduleRepository->getCancelScheduleByDoctor(Auth::user()->id);
        foreach ($cancelSchedule as $cancel) {
            $calendar = new stdClass();
            $dateTime = explode('-', $cancel->date);
            $timers = explode(':', $cancel->hours);

            $calendar->backgroundColor = "red";
            $calendar->borderColor = "red";

            $year = $dateTime[0];
            $month = $dateTime[1] - 1;
            $day = $dateTime[2];
            $hours = $timers[0];
            $minutes = $timers[1];

            if ($month == 1) {
                $year = (int) $year - 1;
            }

            $calendar->title = $cancel->reason;
            $calendar->start = [
                'year' => $year,
                'month' => $month,
                'day' => $day,
                'hours' => $hours,
                'minutes' => $minutes
            ];
            $calendar->allDay = false;
            $calendar->id = $cancel->id;
            $data[] = $calendar;
        }

        foreach ($schedule as $item) {
            $calendar = new stdClass();
            $getName = $this->userRepository->getById($item->customer_id);
            $dateTime = explode('-', $item->date);
            $timers = explode(':', $item->hours);
            if ($item->status == \App\Enums\StatusSchedule::APPROVED) {
                $calendar->backgroundColor = "blue";
                $calendar->borderColor = "blue";
            } else if ($item->status == \App\Enums\StatusSchedule::PENDING) {
                $calendar->backgroundColor = "yellow";
                $calendar->borderColor = "yellow";
            } else if ($item->status == \App\Enums\StatusSchedule::DENIED) {
                $calendar->backgroundColor = "grey";
                $calendar->borderColor = "grey";
            }
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
            $calendar->id = $item->id;
            $data[] = $calendar;
        }

        return view('admin.schedule.index', compact('data', 'allTimers', 'statusDate'));
    }

    public function viewSchedule(Request $request)
    {
        if (isset($request->date)) {
            $date = $request->date;
        } else {
            $date = date('Y-m-d');
        }
        $doctors = $this->userRepository->getDoctorList();
        $timers = [];
        $schedules = [];
        $cancelSchedule = [];
        if (!$doctors->isEmpty()) {
            $doctor_id = $doctors[0]->id;
            if (isset($request->doctor_id)) {
                $doctor_id = $request->doctor_id;
            }
            // tạo mảng ngày tháng
            $hours = new DatePeriod(
                new DateTime(self::START_TIME),
                new DateInterval('PT1H'),
                new DateTime(self::END_TIME)
            );

            $schedules = $this->scheduleRepository->getScheduleByDoctorIdAndDate($doctor_id, $date);
            $cancelSchedule = $this->cancelScheduleRepository->getCancelScheduleByDateAndDoctor($date, $doctor_id);
            foreach ($schedules as $schedule) {
                $user = $this->userRepository->getUserById($schedule->customer_id);
                $lengthStart = strlen($user->phone);
                $user->phone = substr($user->phone, 0, 6);
                $lengthEnd = strlen($user->phone);
                $diff = $lengthStart - $lengthEnd;
                for ($i = 0; $i < $diff; $i++) {
                    $user->phone = $user->phone . '*';
                }
                $schedule->customer_phone = $user->phone;
            }

            foreach ($hours as $hour) {
                $itemTime = new stdClass();
                $itemTime->hours = $hour->format("H:i");
                $itemTime->active = true;

                foreach ($schedules as $schedule) {
                    if (strtotime($hour->format('H:i')) == strtotime($schedule->hours)) {
                        $itemTime->active = false;
                    }
                }

                foreach ($cancelSchedule as $cancel) {
                    if (strtotime($hour->format('H:i')) == strtotime($cancel->hours)) {
                        $itemTime->active = false;
                    }
                }

                $timers[] = $itemTime;
            }
        }

        return view('pages.schedule', compact('doctors', 'timers', 'cancelSchedule', 'date', 'schedules'));
    }

    public function bookSchedule(ScheduleRequest $request)
    {
        $data = [
            'doctor_id' => $request->doctor_id,
            'customer_id' => isset($request->customer_id) ? $request->customer_id : Auth::user()->id,
            'date' => $request->date,
            'hours' => $request->hours,
        ];

        if (isset($request->note)) {
            $data['note'] = $request->note;
        }
        //tạo schedule
        $schedule = $this->scheduleRepository->create($data);

        if ($schedule instanceof Schedule) {
            alert()->flash('Thành công!', 'Lên lịch thành công!');
        } else {
            alert()->flash('Cảnh báo!', 'Lên lịch không thành công!');
        }

        return redirect()->route('schedule.confirmed');
    }

    public function viewScheduleConfirmed()
    {
        return view('pages.schedule-confirmed');
    }

    public function editStatus(Request $request)
    {
        if(!isset($request->id) and !isset($request->status)) {
            abort(404);
        }
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

    public function cancelSchedule(Request $request)
    {
        if ($request->reason == null) {
            alert()->warning('Cảnh báo!', 'Lý do không được để trống!');

            return redirect()->route('admin.schedule.index');
        }

        $data = [
            'users_id' => Auth::user()->id,
            'date' => $request->date_cancel,
            'hours' => $request->timer_cancel,
            'reason' => $request->reason,
        ];

        $cancelSchedule = $this->cancelScheduleRepository->create($data);

        if ($cancelSchedule instanceof CancelSchedule) {
            alert()->success('Thành công!', 'Báo bận thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Báo bận không thành công!');
        }

        return redirect()->route('admin.schedule.index');
    }

    public function cancelScheduleChange(Request $request)
    {
        $date = $request->get('date');

        $allTimers = new DatePeriod(
            new DateTime(self::START_TIME),
            new DateInterval('PT1H'),
            new DateTime(self::END_TIME)
        );
        $arrTime = [];
        foreach ($allTimers as $timer) {
            $cancelScheduleCheckStatus = $this->cancelScheduleRepository->checkStatusHoursByDate($date, $timer);

            if ($cancelScheduleCheckStatus) {
                $arrTime[] = [
                    'timer' => $timer,
                    'status' => 1,
                    'hours' => $timer->format('H:i')
                ];
            } else {
                $arrTime[] = [
                    'timer' => $timer,
                    'status' => 0,
                    'hours' => $timer->format('H:i')
                ];
            }
        }

        return $arrTime;
    }
}
