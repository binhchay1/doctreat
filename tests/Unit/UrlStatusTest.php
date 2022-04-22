<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UrlStatusTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    public function testHomeRequest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testContactRequest()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function testSendContactRequest()
    {
        $response = $this->get('/send-contact');

        $response->assertStatus(200);
    }

    public function testAboutRequest()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function testBlogRequest()
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
    }

    public function testServiceRequest()
    {
        $response = $this->get('/service');

        $response->assertStatus(200);
    }

    public function testProfileRequest()
    {
        $response = $this->get('/profile');

        $response->assertStatus(200);
    }

    public function testHistoryRequest()
    {
        $response = $this->get('/history');

        $response->assertStatus(200);
    }

    public function testConfirmOrderRequest()
    {
        $response = $this->get('/confirm-order');

        $response->assertStatus(200);
    }

    public function testInvoiceRequest()
    {
        $response = $this->get('/invoice');

        $response->assertStatus(200);
    }

    public function testProductRequest()
    {
        $response = $this->get('/product');

        $response->assertStatus(200);
    }

    public function testCartRequest()
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
    }

    public function testErrorPermissionRequest()
    {
        $response = $this->get('/error/permission');

        $response->assertStatus(200);
    }

    public function testErrorStatusRequest()
    {
        $response = $this->get('/error/status');

        $response->assertStatus(200);
    }

    public function testAdminDashboardRequest()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    public function testAdminUserRequest()
    {
        $response = $this->get('/admin/users');

        $response->assertStatus(200);
    }

    public function testAdminProductRequest()
    {
        $response = $this->get('/admin/product');

        $response->assertStatus(200);
    }

    public function testAdminCalendarRequest()
    {
        $response = $this->get('/admin/calendar');

        $response->assertStatus(200);
    }

    public function testAdminStorageRequest()
    {
        $response = $this->get('/admin/storage');

        $response->assertStatus(200);
    }

    public function testAdminPromotionRequest()
    {
        $response = $this->get('/admin/promotion');

        $response->assertStatus(200);
    }
}
