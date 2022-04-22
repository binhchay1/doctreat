<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;
use App\Repositories\InvoiceRepository;
use App\Models\Invoice;

class InvoiceTest extends TestCase
{
    protected $invoice;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->invoice = [
            'payment_code' => $this->faker->payment_code,
            'order_id' => $this->faker->order_id,
        ];
        $this->invoiceRepository = new InvoiceRepository();
    }

    public function testStore()
    {
        $invoice = $this->invoiceRepository->create($this->invoice);
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals($this->invoice['payment_code'], $invoice->payment_code);
        $this->assertEquals($this->invoice['order_id'], $invoice->order_id);
        $this->assertDatabaseHas('invoice', $this->invoice);
    }
}
