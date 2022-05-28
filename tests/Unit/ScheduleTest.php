<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Repositories\ScheduleRepository;
use App\Repositories\CancelScheduleRepository;
use App\Models\Schedule;
use App\Models\CancelSchedule;

class ScheduleTest extends TestCase
{
    protected $schedule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->schedule = new Schedule();
        $this->cancelSchedule = new CancelSchedule();
        $this->scheduleRepository = new ScheduleRepository();
        $this->cancelScheduleRepository = new CancelScheduleRepository();
        $this->faker = Faker::create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->schedule);
    }

    public function test_table_name()
    {
        $this->assertEquals('schedule', $this->schedule->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'doctor_id',
            'customer_id',
            'date',
            'hours',
            'note'
        ], $this->schedule->getFillable());
    }

    public function test_book_schedule()
    {
        $this->schedule = [
            'doctor_id' => $this->faker->randomDigit,
            'customer_id' => $this->faker->randomDigit,
            'date' => $this->faker->date,
            'hours' => $this->faker->text,
            'note' => $this->faker->paragraph
        ];
        $schedule = $this->scheduleRepository->create($this->schedule);
        $this->assertInstanceOf(Schedule::class, $schedule);
        $this->assertEquals($this->schedule['doctor_id'], $schedule->doctor_id);
        $this->assertEquals($this->schedule['customer_id'], $schedule->customer_id);
        $this->assertEquals($this->schedule['date'], $schedule->date);
        $this->assertEquals($this->schedule['hours'], $schedule->hours);
        $this->assertEquals($this->schedule['note'], $schedule->note);
        $this->assertDatabaseHas('schedule', $this->schedule);
    }

    public function test_cancel_schedule()
    {
        $this->cancelSchedule = [
            'users_id' => $this->faker->randomDigit,
            'date' => $this->faker->date,
            'hours' => $this->faker->text,
            'reason' => $this->faker->paragraph
        ];
        $cancelSchedule = $this->cancelScheduleRepository->create($this->cancelSchedule);
        $this->assertInstanceOf(CancelSchedule::class, $cancelSchedule);
        $this->assertEquals($this->cancelSchedule['users_id'], $cancelSchedule->users_id);
        $this->assertEquals($this->cancelSchedule['date'], $cancelSchedule->date);
        $this->assertEquals($this->cancelSchedule['hours'], $cancelSchedule->hours);
        $this->assertEquals($this->cancelSchedule['reason'], $cancelSchedule->reason);
        $this->assertDatabaseHas('cancel_schedule', $this->cancelSchedule);
    }

    public function test_edit_status()
    {
        $status = $this->faker->randomDigit;
        $this->schedule = [
            'doctor_id' => $this->faker->randomDigit,
            'customer_id' => $this->faker->randomDigit,
            'date' => $this->faker->date,
            'hours' => $this->faker->text,
            'note' => $this->faker->paragraph
        ];
        $schedule = $this->scheduleRepository->create($this->schedule);
        $edit_status = $this->scheduleRepository->updateStatus($schedule->id, $status);
        $this->assertEquals($edit_status, 1);
    }
}
