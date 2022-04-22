<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StorageRepository;
use Cart;


class CartController extends Controller
{
    private StorageRepository $storageRepository;

    public function __construct(StorageRepository $storageRepository)
    {
        $this->storageRepository = $storageRepository;
    }

    public function cartList()
    {
        $cartItems = Cart::getContent();

        foreach ($cartItems as $item) {
            $lastQuantity = $this->storageRepository->getLastQuantity($item->id);

            $item->stock = $lastQuantity->quantity;
        }

        return view('pages/cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Thêm sản phẩm thành công!');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        if($request->quantity == 0){
            Cart::remove($request->id);
            return 'success';
        };

        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return 'success';
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
        session()->flash('success', 'Xóa vật phẩm thành công !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();
        session()->flash('success', 'Xóa tất cả thành công !');

        return redirect()->route('cart.list');
    }
}