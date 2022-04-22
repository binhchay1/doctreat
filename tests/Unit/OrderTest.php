<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;
use App\Repositories\OrderRepository;
use App\Repositories\OrderLineRepository;
use App\Models\Order;

class OrderTest extends TestCase
{
    protected $order;
    protected $orderLine;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->order = [
            'name_customer' => $this->faker->name_customer,
            'phone_customer' => $this->faker->phone_customer,
            'address_customer' => $this->faker->address_customer,
            'order_date' => $this->faker->order_date,
            'zip_code' => $this->faker->zip_code,
            'status' => $this->faker->status,
        ];
        $this->orderLine = [
            'order_id' => $this->faker->order_id,
            'product_id' => $this->faker->product_id,
            'quantity' => $this->faker->quantity,
        ];
        $this->orderRepository = new OrderRepository();
        $this->orderLineRepository = new OrderLineRepository();
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    public function testStore()
    {
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
