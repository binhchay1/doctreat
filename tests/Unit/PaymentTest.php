<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;
use App\Repositories\PaymentRepository;
use App\Models\Payment;

class PaymentTest extends TestCase
{
    protected $payment;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->payment = [
            'payment_code' => $this->faker->payment_code,
            'order_id' => $this->faker->order_id,
            'name_customer' => $this->faker->name_customer,
            'phone_customer' => $this->faker->phone_customer,
            'order_date' => $this->faker->order_date,
            'cost' => $this->faker->cost,
            'status_payment' => $this->faker->status_payment,
            'address_customer' => $this->faker->address_customer,
        ];
        $this->paymentRepository = new PaymentRepository();
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    public function testStore()
    {
        $payment = $this->paymentRepository->create($this->payment);
        $this->assertInstanceOf(Payment::class, $payment);
        $this->assertEquals($this->payment['payment_code'], $payment->payment_code);
        $this->assertEquals($this->payment['order_id'], $payment->order_id);
        $this->assertEquals($this->payment['name_customer'], $payment->name_customer);
        $this->assertEquals($this->payment['phone_customer'], $payment->phone_customer);
        $this->assertEquals($this->payment['order_date'], $payment->order_date);
        $this->assertEquals($this->payment['cost'], $payment->cost);
        $this->assertEquals($this->payment['status_payment'], $payment->status_payment);
        $this->assertEquals($this->payment['address_customer'], $payment->address_customer);
        $this->assertDatabaseHas('payment', $this->payment);
    }
}
