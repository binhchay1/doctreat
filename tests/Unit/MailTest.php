<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Mail\AcceptMail;
use App\Mail\DenyMail;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use Faker\Factory as Faker;

class MailTest extends TestCase
{
    protected $mailData;

    public function setUp(): void
    {
        $this->faker = Faker::create();
    }

    public function testSend()
    {
        Mail::assertSent(AcceptMail::class);
        Mail::assertSent(DenyMail::class);
        Mail::assertSent(InvoiceMail::class);
    }
}
