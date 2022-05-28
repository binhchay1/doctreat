<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\ProductRepository;
use App\Repositories\StorageRepository;
use App\Repositories\StorageHistoryRepository;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductClone;
use App\Models\StorageHistory;
use App\Models\Storage;
use Tests\TestCase;
use Faker\Factory as Faker;

class ProductFlowTest extends TestCase
{
    use RefreshDatabase;

    protected $product;
    protected $storage;
    protected $storageHistory;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->productRepository = new ProductRepository();
        $this->storageHistoryRepository = new StorageHistoryRepository();
        $this->storageRepository = new StorageRepository();
        $this->product = new Product();
        $this->storage = new Storage();
        $this->storageHistory = new StorageHistory();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->product);
    }

    public function test_list_product_admin()
    {
        $uri = env('APP_URL') . '/error/permission';
        $response = $this->get('/admin/product');

        $response->assertStatus(302);
        $response->assertRedirect($uri);

        $user = User::factory()->withPersonalTeam()->create([
            'role' => 1,
        ]);

        $response = $this->actingAs($user)
            ->get('/admin/product');

        $response->assertStatus(200);
        $response->assertViewIs('admin.product.index')->assertSee('product');
        $response->assertViewHasAll([
            'product'
        ]);
    }

    public function test_update_product()
    {
        $this->product = [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(),
            'type' => $this->faker->text,
            'image' => UploadedFile::fake()->image('image.jpg')->path()
        ];
        $product = $this->productRepository->create($this->product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertEquals($this->product['price'], $product->price);
        $this->assertEquals($this->product['type'], $product->type);
        $this->assertEquals($this->product['image'], $product->image);
        $this->assertDatabaseHas('products', $this->product);

        $data = [
            'id' => $product->id,
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(),
            'type' => $this->faker->text,
            'image' => UploadedFile::fake()->image('image.jpg')->path()
        ];

        $uri = env('APP_URL') . '/error/permission';
        $response = $this->post('/admin/product/update/', $data);

        $response->assertStatus(302);
        $response->assertRedirect($uri);

        $user = User::factory()->withPersonalTeam()->create([
            'role' => 1,
        ]);

        $response = $this->actingAs($user)->followingRedirects()
            ->post('/admin/product/update/' . $product->id, $data);

        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();

        $getProduct = $this->productRepository->getById($product->id);
        $this->assertEquals($this->product['name'], $getProduct->name);
        $this->assertEquals($this->product['description'], $getProduct->description);
        $this->assertEquals($this->product['price'], $getProduct->price);
        $this->assertEquals($this->product['type'], $getProduct->type);
        $this->assertEquals($this->product['image'], $getProduct->image);
    }

    public function test_store_product()
    {
        $data = [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(),
            'type' => $this->faker->text,
            'image' => UploadedFile::fake()->image('image.jpg')->path()
        ];

        $this->product = [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(),
            'type' => $this->faker->text,
            'image' => UploadedFile::fake()->image('image.jpg')->path()
        ];

        $product = $this->productRepository->create($this->product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertEquals($this->product['price'], $product->price);
        $this->assertEquals($this->product['type'], $product->type);
        $this->assertEquals($this->product['image'], $product->image);
        $this->assertDatabaseHas('products', $this->product);

        $uri = env('APP_URL') . '/error/permission';
        $response = $this->post('/admin/product/store/', $data);

        $response->assertStatus(302);
        $response->assertRedirect($uri);

        $user = User::factory()->withPersonalTeam()->create([
            'role' => 1,
        ]);

        $response = $this->actingAs($user)->followingRedirects()
            ->post('/admin/product/store/', $data);

        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();

        $product = $this->productRepository->getLastProductByTime();
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertEquals($this->product['price'], $product->price);
        $this->assertEquals($this->product['type'], $product->type);
        $this->assertEquals($this->product['image'], $product->image);

        $product = ProductClone::create($this->product);
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertEquals($this->product['price'], $product->price);
        $this->assertEquals($this->product['type'], $product->type);
        $this->assertEquals($this->product['image'], $product->image);
    }

    public function test_delete_product()
    {
        $this->product = [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(),
            'type' => $this->faker->text,
            'image' => UploadedFile::fake()->image('image.jpg')->path()
        ];
        $product = $this->productRepository->create($this->product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertEquals($this->product['price'], $product->price);
        $this->assertEquals($this->product['type'], $product->type);
        $this->assertEquals($this->product['image'], $product->image);
        $this->assertDatabaseHas('products', $this->product);

        $this->storage = [
            'product_id' => $product->id,
            'quantity' => 0
        ];
        $this->storageHistory = [
            'product_id' => $product->id,
            'last_quantity' => $this->faker->randomDigit,
            'add_quantity' => $this->faker->randomDigit,
            'note' => $this->faker->text,
            'employee' => $this->faker->text,
            'employee_id' => $this->faker->randomDigit,
            'status' => \App\Enums\StatusStorage::PENDING,
            'invoice' => $this->faker->text,
            'type' => $this->faker->text
        ];
        $storage = $this->storageRepository->create($this->storage);
        $storageHistory = $this->storageHistoryRepository->create($this->storageHistory);
        $this->assertInstanceOf(Storage::class, $storage);
        $this->assertInstanceOf(StorageHistory::class, $storageHistory);
        $this->assertDatabaseHas('storage', $this->storage);
        $this->assertDatabaseHas('storage_history', $this->storageHistory);

        $url = '/admin/product/delete?id=' . $product->id;
        $response = $this->get($url);
        $response->assertStatus(302);

        $user = User::factory()->withPersonalTeam()->create([
            'role' => 1,
        ]);

        $response = $this->actingAs($user)->followingRedirects()
            ->get($url);

        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
        $getProduct = $this->productRepository->checkProductNotExists($product->id);
        $this->assertTrue($getProduct);
    }
}
