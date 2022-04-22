<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;
use App\Repositories\ProductRepository;
use App\Models\Product;

class ProductTest extends TestCase
{
    protected $product;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->product = [
            'name' => $this->faker->name,
            'description' => $this->faker->description,
            'price' => $this->faker->price,
        ];
        $this->productRepository = new ProductRepository();
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    public function testStore()
    {
        $product = $this->productRepository->create($this->product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertDatabaseHas('product', $this->product);
    }

    public function testShow()
    {
        $product = factory(Product::class)->create();
        $found = $this->productRepository->show($product->id);
        $this->assertInstanceOf(Product::class, $found);
        $this->assertEquals($found->name, $product->name);
        $this->assertEquals($found->description, $product->description);
    }

    public function testUpdate()
    {
        $product = factory(Product::class)->create();
        $newProduct = $this->productRepository->updateById($this->product, $product);
        $this->assertInstanceOf(Product::class, $newProduct);
        $this->assertEquals($newProduct->name, $this->product['name']);
        $this->assertEquals($newProduct->description, $this->product['description']);
        $this->assertDatabaseHas('product', $this->product);
    }

    public function testDestroy()
    {
        $product = factory(Product::class)->create();
        $deleteProduct = $this->productRepository->destroy($product);
        $this->assertTrue($deleteProduct);
        $this->assertDatabaseMissing('product', $product->toArray());
    }   
}
