<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;
use App\Repositories\storageRepository;
use App\Models\storage;

class StorageTest extends TestCase
{
    protected $storage;
    protected $storageHistory;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->storage = [
            'product_id' => $this->faker->id,
            'quantity' => 0
        ];

        $this->storageHistory = [
            'product_id' => $this->faker,
            'last_quantity' => $this->faker->add_quantity,
            'add_quantity' => $this->faker->add_quantity,
            'note' => $this->faker->note,
            'employee' => $this->faker->employee,
            'employee_id' => $this->faker->employee_id,
            'status' => '3'
        ];

        $this->storageRepository = new storageRepository();
        $this->storageHistoryRepository = new storageRepository();
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    
    public function testStore()
    {
        $storage = $this->storageRepository->create($this->storage);
        $storageHistory = $this->storageHistoryRepository->create($this->storageHistory);
        $this->assertInstanceOf(Storage::class, $storage);
        $this->assertInstanceOf(StorageHistory::class, $storageHistory);
        $this->assertDatabaseHas('storage', $this->storage);
        $this->assertDatabaseHas('storage_history', $this->storageHistory);
    }

    public function testEditStatus()
    {
        $id = $this->faker->id;
        $status = $this->faker->status;
        $product_id = $this->faker->product_id;
        $quantity = $this->faker->quantity;

        $lastQuantity = $this->storageRepository->getLastQuantity($product_id);
        $edit_status = $this->storageHistoryRepository->updateStatus($id, $status);

        $dataStorage = [
            'product_id' => $product_id,
            'quantity' => (int) $lastQuantity->quantity + $quantity
        ];

        $updateStorage = $this->storageRepository->addStorage($dataStorage);

        $this->assertInstanceOf(Storage::class, $newStorage);
        $this->assertEquals($updateStorage, 1);
        $this->assertEquals($edit_status, 1);
    }
}
