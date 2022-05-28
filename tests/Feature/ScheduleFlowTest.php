<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\ScheduleRepository;
use App\Models\User;
use App\Models\Schedule;
use Tests\TestCase;
use Faker\Factory as Faker;

class ScheduleFlowTest extends TestCase
{
    use RefreshDatabase;

    protected $schedule;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->scheduleRepository = new ScheduleRepository();
        $this->schedule = new Schedule();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->schedule);
    }

    public function test_view_schedule()
    {
        $uri = env('APP_URL') . '/error/permission';
        $response = $this->get('/schedule');

        $response->assertStatus(302);
        $response->assertRedirect($uri);

        $user = User::factory()->withPersonalTeam()->create([
            'role' => 4,
        ]);

        $response = $this->actingAs($user)
            ->get('/schedule');

        $response->assertStatus(200);
        $response->assertViewIs('pages.schedule')->assertSee('schedule');
        $response->assertViewHasAll([
            'doctors',
            'timers',
            'cancelSchedule',
            'date',
            'schedules',
        ]);
    }

    public function test_book_schedule()
    {
        $data = [
            'doctor_id' => $this->faker->randomDigit,
            'customer_id' => $this->faker->randomDigit,
            'note' => $this->faker->text,
            'date' => $this->faker->text,
            'hours' => $this->faker->text,
        ];
        $uri = env('APP_URL') . '/error/permission';
        $response = $this->post('/schedule-book', $data);

        $response->assertStatus(302);
        $response->assertRedirect($uri);

        $user = User::factory()->withPersonalTeam()->create([
            'role' => 4,
        ]);

        $uri = env('APP_URL') . '/schedule-confirmed';
        $response = $this->actingAs($user)
            ->post('/schedule-book', $data);
        $response->assertStatus(302);
        $response->assertRedirect($uri);
        $response->assertSessionHasNoErrors();

        $schedule = $this->scheduleRepository->getLastScheduleByTime();
        $this->assertEquals($data['doctor_id'], $schedule->doctor_id);
        $this->assertEquals($data['customer_id'], $schedule->customer_id);
        $this->assertEquals($data['date'], $schedule->date);
        $this->assertEquals($data['hours'], $schedule->hours);
    }

    public function test_edit_status()
    {
        $this->schedule = [
            'doctor_id' => $this->faker->randomDigit,
            'customer_id' => $this->faker->randomDigit,
            'date' => $this->faker->date,
            'hours' => $this->faker->text,
            'note' => $this->faker->text
        ];
        $schedule = $this->scheduleRepository->create($this->schedule);
        $this->assertInstanceOf(Schedule::class, $schedule);
        $this->assertEquals($this->schedule['doctor_id'], $schedule->doctor_id);
        $this->assertEquals($this->schedule['customer_id'], $schedule->customer_id);
        $this->assertEquals($this->schedule['date'], $schedule->date);
        $this->assertEquals($this->schedule['hours'], $schedule->hours);
        $this->assertEquals($this->schedule['note'], $schedule->note);
        $this->assertDatabaseHas('schedule', $this->schedule);

        $schedule = $this->scheduleRepository->getLastScheduleByTime();
        $data = [
            'id' => $schedule->id,
            'status' => $this->faker->randomDigit
        ];
        $uri = env('APP_URL') . '/error/permission';
        $response = $this->get('/admin/schedule/edit/status', $data);

        $response->assertStatus(302);
        $response->assertRedirect($uri);

        $user = User::factory()->withPersonalTeam()->create([
            'role' => 2,
        ]);

        $url = '/admin/schedule/edit/status?id=' . $data['id'] . '&status=' . $data['status'];
        $response = $this->actingAs($user)
            ->get($url);
        $response->assertStatus(404);
        $response->assertSessionHasNoErrors();

        $schedule = $this->scheduleRepository->getById($data['id']);
        $this->assertEquals($schedule->status, $data['status']);
    }
}
