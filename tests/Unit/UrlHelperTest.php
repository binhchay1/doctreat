<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\UrlHelper;

class UrlHelperTest extends TestCase
{
    public function testExtractLinksFromString()
    {
        $urlHelper = new UrlHelper();
        $this->assertEmpty($urlHelper->extractLinksFromString(''));
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    protected function reloadPermissions()
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
