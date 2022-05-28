<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\StorageRepository;
use App\Repositories\ProductCloneRepository;
use App\Repositories\StorageHistoryRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductClone;

class ProductController extends Controller
{
    private ProductRepository $productRepository;
    private ProductCloneRepository $productCloneRepository;
    private StorageRepository $storageRepository;
    private StorageHistoryRepository $storageHistoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        StorageRepository $storageRepository,
        StorageHistoryRepository $storageHistoryRepository,
        ProductCloneRepository $productCloneRepository
    ) {
        $this->productRepository = $productRepository;
        $this->storageRepository = $storageRepository;
        $this->productCloneRepository = $productCloneRepository;
        $this->storageHistoryRepository = $storageHistoryRepository;
    }

    public function productList(Request $request)
    {
        if ($request->category) {
            $filter = [];
            $filter['type'] = $request->category;
            $products = $this->productRepository->getListProduct($filter);
        } else {
            $products = $this->productRepository->getListProduct();
        }
        $categories = $this->productRepository->getCategoriesAndCount();

        if ($request->arrange) {
            // tìm theo giá lớn nhất
            if ($request->arrange == 'high') {
                if ($request->category) {
                    $products = $this->productRepository->getListProductWithHighToLowPrice($request->category);
                } else {
                    $products = $this->productRepository->getListProductWithHighToLowPrice();
                }
            }
            // tìm theo giá nhỏ nhât
            if ($request->arrange == 'low') {
                if ($request->category) {
                    $products = $this->productRepository->getListProductWithLowToHighPrice($request->category);
                } else {
                    $products = $this->productRepository->getListProductWithLowToHighPrice();
                }
            }

            if ($request->arrange == 'bestseller') {
                if ($request->category) {
                    $products = $this->productRepository->getListProductWithBestSeller($request->category);
                } else {
                    $products = $this->productRepository->getListProductWithBestSeller();
                }

                foreach ($products as $product) {
                    $total = 0;
                    foreach ($product->orderLine as $orderLine) {
                        $total = $total + $orderLine->quantity;
                    }
                    $product->total = $total;
                }
                
                $products = $products->setCollection($products->sortByDesc('total'));
            }
        }

        return view('pages.products', compact('products', 'categories'));
    }

    public function listProductAdmin(Request $request)
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

        return view('admin.product.index', compact('product'));
    }

    public function createProduct()
    {
        return view('admin.product.create');
    }

    public function viewUpdateProduct(Product $product)
    {
        return view('admin.product.update', compact('product'));
    }

    public function updateProduct(UpdateProductRequest $request, Product $product)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
        ];

        if ($request->file()) {

            $path = '/uploads/product';
            $image = $request->file('img');
             //Lấy Tên files
            $image_name = $image->getClientOriginalName();
            $image_add = $image_name . "_" . time();
            $image->move(public_path($path), $image_add);

            $data['image'] = "$path/$image_add";
        }

        $isUpdated = $this->productRepository->updateById($product->id, $data);
        if ($isUpdated) {
            alert()->success('Thành công!', 'Cập nhật ' . $request->name . ' thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Cập nhật sản phẩm lỗi!');
        }

        return redirect()->route('admin.products.index');
    }

    public function storeProduct(ProductRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
        ];

        if ($request->file()) {

            $path = '/uploads/product';
            $image = $request->file('img');
            $image_name = $image->getClientOriginalName();
            $image_add = $image_name . "_" . time();
            $image->move(public_path($path), $image_add);

            $data['image'] = "$path/$image_add";
        }

        $product = $this->productRepository->create($data);
        $productClone = $this->productCloneRepository->create($data);

        $dataStorage = [
            'product_id' => $product->id,
            'quantity' => '0'
        ];

        $this->storageRepository->create($dataStorage);

        if ($product instanceof Product && $productClone instanceof ProductClone) {
            alert()->success('Thành công!', 'Tạo sản phẩm thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Tạo sản phẩm lỗi!');
        }

        return redirect()->route('admin.products.index');
    }

    public function deleteProduct(int $productId = 0)
    {
        if(request()->get('id')) {
            $productId = (int) request()->get('id');
        }

        $product = $this->productRepository->deleteById($productId);
        $storage = $this->storageRepository->deleteByProductId($productId);
        $history = $this->storageHistoryRepository->updateStatusByProductId($productId, \App\Enums\StatusStorage::DELETED);

        alert()->success('Thành công!', 'Xóa sản phẩm thành công!');
        return redirect()->route('admin.products.index');
    }

    public function productSearch(Request $request)
    {
        $filter['name'] = $request->name;
        $products = $this->productRepository->getListProduct($filter);
        $categories = $this->productRepository->getCategoriesAndCount();

        return view('pages.products', compact('products', 'categories'));
    }

    public function productDetail(Request $request)
    {
        $id = $request->id;
        $product = $this->productRepository->with('storage')->getById($id);

        return view('pages.detail', compact('product'));
    }
}
