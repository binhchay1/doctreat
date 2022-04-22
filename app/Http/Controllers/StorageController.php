<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\StorageRepository;
use App\Repositories\StorageHistoryRepository;
use App\Http\Requests\StorageRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\StorageHistory;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    private ProductRepository $productRepository;
    private StorageRepository $storageRepository;
    private StorageHistoryRepository $storageHistoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        StorageRepository $storageRepository,
        StorageHistoryRepository $storageHistoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->storageRepository = $storageRepository;
        $this->storageHistoryRepository = $storageHistoryRepository;
    }

    public function index(Request $request)
    {
        $filters = [];
        if (isset($request->name)) {
            $filters['name'] = $request->name;
        }

        if (isset($request->description)) {
            $filters['description'] = $request->description;
        }

        if (isset($request->type)) {
            $filters['type'] = $request->type;
        }

        $product = $this->productRepository->getListProduct($filters);

        return view('admin.storage.index', compact('product'));
    }

    public function createStorage()
    {
        $product = $this->productRepository->getListProduct();

        return view('admin.storage.create', compact('product'));
    }

    public function viewExportStorage()
    {
        $product = $this->productRepository->getListProduct();
        foreach ($product as $p) {
            $p->quantity = $this->storageRepository->getLastQuantity($p->id);
        }

        return view('admin.storage.export', compact('product'));
    }

    public function historyStorage()
    {
        $history = $this->storageHistoryRepository->getListHistory();

        return view('admin.storage.history', compact('history'));
    }

    public function storeStorage(Request $request)
    {
        $lastQuantity = $this->storageRepository->getLastQuantity($request->product);
        $status = 0;

        for ($i = 0; $i < $request->total_ticket; $i++) {

            $dataHistory = [
                'product_id' => $request->product[$i],
                'last_quantity' => $lastQuantity->quantity,
                'add_quantity' => $request->quantity[$i],
                'note' => $request->note[$i],
                'employee' => Auth::user()->name,
                'employee_id' => Auth::user()->id,
                'status' => '3',
                'type' => 'import'
            ];

            if ($request->file()) {

                $path = '/uploads/storage';
                $image = $request->file('img');
                $image_name = $image[$i]->getClientOriginalName();
                $image_add = $image_name . "_" . time();
                $image[$i]->move(public_path($path), $image_add);

                $dataHistory['invoice'] = "$path/$image_add";
            }

            $storage_history = $this->storageHistoryRepository->create($dataHistory);
            if ($storage_history instanceof StorageHistory) {
                $status = 1;
            }
        }

        if ($status == 1) {
            alert()->success('Thành công!', 'Nhập kho hàng thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Nhập kho hàng lỗi!');
        }

        return redirect()->route('admin.storage.index');
    }

    public function editStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $lastQuantity = $this->storageRepository->getLastQuantity($product_id);
        $edit_status = $this->storageHistoryRepository->updateStatus($id, $status);

        if ($status == 1) {
            $dataStorage = [
                'product_id' => $product_id,
                'quantity' => (int) $lastQuantity->quantity + (int) $quantity
            ];

            $updateStorage = $this->storageRepository->addStorage($dataStorage);

            if ($edit_status == 1 and $updateStorage == 1) {
                alert()->success('Thành công!', 'Duyệt phiếu thành công!');
            } else {
                alert()->warning('Cảnh báo!', 'Duyệt phiếu lỗi!');
            }

            return redirect()->route('admin.history.storage');
        }

        if ($edit_status == 1) {
            alert()->success('Thành công!', 'Duyệt phiếu thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Duyệt phiếu lỗi!');
        }

        return redirect()->route('admin.history.storage');
    }

    public function exportStorage(Request $request)
    {
        $lastQuantity = $this->storageRepository->getLastQuantity($request->product);

        $dataHistory = [
            'product_id' => $request->product,
            'last_quantity' => $lastQuantity->quantity,
            'add_quantity' => $request->quantity,
            'note' => $request->note,
            'employee' => Auth::user()->name,
            'employee_id' => Auth::user()->id,
            'type' => 'export'
        ];

        $dataStorage = [
            'product_id' => $request->product,
            'quantity' => $lastQuantity->quantity - $request->quantity
        ];

        if ($request->file()) {

            $path = '/uploads/storage';
            $image = $request->file('img');
            $image_name = $image->getClientOriginalName();
            $image_add = $image_name . "_" . time();
            $image->move(public_path($path), $image_add);

            $dataHistory['invoice'] = "$path/$image_add";
        }

        if (Auth::user()->role == \App\Enums\Role::ADMIN) {
            $dataHistory['status'] = \App\Enums\StatusStorage::APPROVED;
        } else {
            $dataHistory['status'] = \App\Enums\StatusStorage::PENDING;
        }

        $storage_history = $this->storageHistoryRepository->create($dataHistory);
        $storage = $this->storageRepository->addStorage($dataStorage);

        if ($storage_history instanceof StorageHistory and $storage == 1) {
            alert()->success('Thành công!', 'Xuất kho hàng thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Xuất kho hàng lỗi!');
        }

        if (Auth::user()->role == \App\Enums\Role::ADMIN) {
            return redirect()->route('admin.products.index'); 
        } else {
            return redirect()->route('admin.storage.index');
        }
    }
}
