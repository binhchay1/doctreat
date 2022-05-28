<?php

namespace Tests\Unit;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Repositories\StorageRepository;
use App\Repositories\StorageHistoryRepository;
use App\Models\Storage;
use App\Models\StorageHistory;

class StorageTest extends TestCase
{
    protected $storage;
    protected $storageHistory;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->storage = [
            'product_id' => $this->faker->randomDigit,
            'quantity' => 0
        ];

        $this->storageHistory = [
            'product_id' => $this->faker->randomDigit,
            'last_quantity' => $this->faker->randomDigit,
            'add_quantity' => $this->faker->randomDigit,
            'note' => $this->faker->text,
            'employee' => $this->faker->text,
            'employee_id' => $this->faker->randomDigit,
            'status' => '3',
            'invoice' => $this->faker->text,
            'type' => $this->faker->text
        ];

        $this->storageRepository = new StorageRepository();
        $this->storageHistoryRepository = new StorageHistoryRepository();
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
        $status = $this->faker->randomDigit;
        $storage = $this->storageRepository->create($this->storage);
        $dataStorage = [
            'product_id' => $storage->product_id,
            'quantity' => $this->faker->randomDigit
        ];

        $storageHistory = $this->storageHistoryRepository->create($this->storageHistory);
        $edit_status = $this->storageHistoryRepository->updateStatus($storageHistory->id, $status);
        $updateStorage = $this->storageRepository->addStorage($dataStorage);
        
        $this->assertEquals($updateStorage, 1, 0);
        $this->assertEquals($edit_status, 1, 0);
    }
}
