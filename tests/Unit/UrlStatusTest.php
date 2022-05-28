<?php

namespace Tests\Unit;

use Tests\TestCase;

class UrlStatusTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
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

    public function testAboutRequest()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function testServiceRequest()
    {
        $response = $this->get('/service');

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

        $response->assertStatus(302);
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

        $response->assertStatus(302);
    }

    public function testAdminUserRequest()
    {
        $response = $this->get('/admin/users');

        $response->assertStatus(302);
    }

    public function testAdminProductRequest()
    {
        $response = $this->get('/admin/product');

        $response->assertStatus(302);
    }

    public function testAdminCalendarRequest()
    {
        $response = $this->get('/admin/schedule');

        $response->assertStatus(302);
    }

    public function testAdminStorageRequest()
    {
        $response = $this->get('/admin/storage');

        $response->assertStatus(302);
    }

    public function testAdminPromotionRequest()
    {
        $response = $this->get('/admin/promotion');

        $response->assertStatus(302);
    }
}
