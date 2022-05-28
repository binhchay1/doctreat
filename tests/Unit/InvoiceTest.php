<?php

namespace Tests\Unit;

use App\Repositories\InvoiceRepository;
use Tests\TestCase;
use App\Models\Invoice;
use Faker\Factory as Faker;

class InvoiceTest extends TestCase
{
    protected $invoice;

    protected function setUp(): void
    {
        parent::setUp();
        $this->invoice = new Invoice();
        $this->invoiceRepository = new InvoiceRepository();
        $this->faker = Faker::create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->invoice);
    }

    public function test_table_name()
    {
        $this->assertEquals('invoice', $this->invoice->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'payment_code',
            'order_id'
        ], $this->invoice->getFillable());
    }

    public function test_store()
    {
        $this->invoice = [
            'payment_code' => $this->faker->text,
            'order_id' => $this->faker->randomDigit
        ];
        $invoice = $this->invoiceRepository->create($this->invoice);
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals($this->invoice['payment_code'], $invoice->payment_code);
        $this->assertEquals($this->invoice['order_id'], $invoice->order_id);
        $this->assertDatabaseHas('invoice', $this->invoice);
    }
}
