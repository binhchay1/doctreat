<?php

namespace Tests\Unit;

use Tests\TestCase;
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
        $this->product = new Product();
        $this->productRepository = new ProductRepository();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->product);
    }

    public function test_table_name()
    {
        $this->assertEquals('products', $this->product->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'id',
            'name',
            'price',
            'image',
            'description',
            'type'
        ], $this->product->getFillable());
    }

    public function testStore()
    {
        $this->product = [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomDigit,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
            'type' => $this->faker->text
        ];
        $product = $this->productRepository->create($this->product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertDatabaseHas('products', $this->product);
    }

    public function testUpdate()
    {
        $this->product = [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomDigit,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
            'type' => $this->faker->text
        ];

        $arrayUpdate = [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomDigit,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
            'type' => $this->faker->text
        ];

        $product = $this->productRepository->create($this->product);
        $newProduct = $this->productRepository->updateById($product->id, $arrayUpdate);
        $this->assertInstanceOf(Product::class, $newProduct);
        $this->assertEquals($newProduct->name, $arrayUpdate['name']);
        $this->assertEquals($newProduct->description, $arrayUpdate['description']);
        $this->assertEquals($newProduct->price, $arrayUpdate['price']);
        $this->assertEquals($newProduct->image, $arrayUpdate['image']);
        $this->assertEquals($newProduct->type, $arrayUpdate['type']);
        $this->assertDatabaseHas('products', $arrayUpdate);
    }

    public function testDestroy()
    {
        $this->product = [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomDigit,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
            'type' => $this->faker->text
        ];
        $product = $this->productRepository->create($this->product);
        $deleteProduct = $this->productRepository->destroy($product->id);
        $this->assertEquals($deleteProduct, 1);
        $this->assertDatabaseMissing('products', $product->toArray());
    }
}
