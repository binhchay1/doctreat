<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Mail\AcceptMail;
use App\Mail\DenyMail;
use App\Mail\InvoiceMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Faker\Factory as Faker;

class MailTest extends TestCase
{
    protected $user;
    protected $mailData;

    public function setUp(): void
    {
        $this->faker = Faker::create();
        $this->user = new User();
        $this->mailData = [
            'title' => 'Thư từ DiamondPet.com',
            'body' => 'Thưa quý khách,',
            'date' => $this->faker->date,
            'hours' => $this->faker->text,
            'doctor' => $this->faker->randomDigit,
        ];
    }

    public function testSend()
    {
        Mail::fake();

        Mail::to($this->faker->email)->send(new AcceptMail($this->mailData));
        Mail::assertSent(AcceptMail::class);

        Mail::to($this->faker->email)->send(new DenyMail($this->mailData));
        Mail::assertSent(DenyMail::class);

        Mail::to($this->faker->email)->send(new InvoiceMail($this->mailData));
        Mail::assertSent(InvoiceMail::class);
    }
}
