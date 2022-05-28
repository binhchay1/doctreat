<?php

namespace Tests\Unit;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Repositories\OrderRepository;
use App\Repositories\OrderLineRepository;
use App\Models\Order;
use App\Models\OrderLine;
use App\Repositories\PaymentRepository;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderTest extends TestCase
{
    protected $order;
    protected $orderLine;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->order = new Order();
        $this->orderLine = new OrderLine();
        $this->orderRepository = new OrderRepository();
        $this->orderLineRepository = new OrderLineRepository();
        $this->paymentRepository = new PaymentRepository();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->order);
        unset($this->orderLine);
    }

    public function test_table_name()
    {
        $this->assertEquals('order', $this->order->getTable());
        $this->assertEquals('order_line', $this->orderLine->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'name_customer',
            'phone_customer',
            'address_customer',
            'zip_code',
            'order_date',
            'status'
        ], $this->order->getFillable());

        $this->assertEquals([
            'order_id',
            'product_id',
            'quantity',
        ], $this->orderLine->getFillable());
    }

    public function test_relationship()
    {
        $this->order = [
            'name_customer' => $this->faker->name,
            'phone_customer' => $this->faker->phoneNumber,
            'address_customer' => $this->faker->address,
            'order_date' => $this->faker->date,
            'zip_code' => $this->faker->randomDigit,
            'status' => $this->faker->randomDigit,
        ];
        $this->orderLine = [
            'order_id' => $this->faker->randomDigit,
            'product_id' => $this->faker->randomDigit,
            'quantity' => $this->faker->randomDigit,
        ];
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
        $order = $this->orderRepository->create($this->order);
        $orderLine = $this->orderLineRepository->create($this->orderLine);
        $payment = $this->paymentRepository->create($this->payment);
        $this->assertInstanceOf(HasMany::class, $order->orderLine());
        $this->assertInstanceOf(HasOne::class, $order->payment());
        $this->assertEquals('order_id', $order->orderLine()->getForeignKeyName());
        $this->assertEquals('order_id', $order->payment()->getForeignKeyName());
    }

    public function testStore()
    {
        $this->order = [
            'name_customer' => $this->faker->name,
            'phone_customer' => $this->faker->phoneNumber,
            'address_customer' => $this->faker->address,
            'order_date' => $this->faker->date,
            'zip_code' => $this->faker->randomDigit,
            'status' => $this->faker->randomDigit,
        ];
        $this->orderLine = [
            'order_id' => $this->faker->randomDigit,
            'product_id' => $this->faker->randomDigit,
            'quantity' => $this->faker->randomDigit,
        ];
        $order = $this->orderRepository->create($this->order);
        $orderLine = $this->orderLineRepository->create($this->orderLine);
        $this->assertInstanceOf(Order::class, $order);
        $this->assertInstanceOf(OrderLine::class, $orderLine);
        $this->assertEquals($this->order['name_customer'], $order->name_customer);
        $this->assertEquals($this->order['phone_customer'], $order->phone_customer);
        $this->assertEquals($this->order['address_customer'], $order->address_customer);
        $this->assertEquals($this->order['order_date'], $order->order_date);
        $this->assertEquals($this->order['zip_code'], $order->zip_code);
        $this->assertEquals($this->order['status'], $order->status);
        $this->assertEquals($this->orderLine['order_id'], $orderLine->order_id);
        $this->assertEquals($this->orderLine['product_id'], $orderLine->product_id);
        $this->assertEquals($this->orderLine['quantity'], $orderLine->quantity);
        $this->assertDatabaseHas('order', $this->order);
        $this->assertDatabaseHas('order_line', $this->orderLine);
    }
}
