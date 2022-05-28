<?php

namespace Tests\Unit;

use Tests\TestCase;
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
        $this->payment = new Payment();
        $this->paymentRepository = new PaymentRepository();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->payment);
    }

    public function test_table_name()
    {
        $this->assertEquals('payment', $this->payment->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'status_payment',
            'payment_code',
            'order_id',
            'name_customer',
            'phone_customer',
            'order_date',
            'cost',
            'address_customer'
        ], $this->payment->getFillable());
    }

    public function testStore()
    {
        $this->payment = [
            'payment_code' => $this->faker->creditCardNumber,
            'order_id' => $this->faker->randomDigit,
            'name_customer' => $this->faker->name,
            'phone_customer' => $this->faker->phoneNumber,
            'order_date' => $this->faker->date,
            'cost' => $this->faker->randomDigit,
            'status_payment' => $this->faker->randomDigit,
            'address_customer' => $this->faker->address,
        ];
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
