<?php

namespace App\Controllers;

use App\Models\CartModel;

class Cart extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $CartModel;

    public function __construct()
    {
        $this->CartModel = new CartModel();
    }

    protected function addUserCart()
    {
        $this->CartModel->addUserCart();
    }

    public function addItemToCart($productId)
    {
        $cart = $this->getUserCart();

        if (!$cart) {
            $this->addUserCart();
            $cart = $this->getUserCart();
        }

        $cartId = $cart['id'];

        $data = [
            'cart_id' => $cartId,
            'product_id' => $productId
        ];

        if (!$this->isItemInCart($productId)) {
            $this->CartModel->addItemToCart($data);
        }

        $cartItem = $this->getItemInUserCart();

        return json_encode(count($cartItem));
    }

    public function buyNow($productId)
    {
        // dd('ok');
        $cart = $this->getUserCart();
        $data = [
            'cart_id' => $cart['id'],
            'product_id' => $productId,
            'process_into_transaction' =>1
        ];

        $this->CartModel->addItemToCart($data);
        return redirect()->to('/cart'); 
    }

    protected function getUserCart()
    {
        return $this->CartModel->getUserCart();
    }

    protected function getItemInUserCart()
    {
        $itemInCart = $this->CartModel->getItemInUserCart();
        if ($itemInCart) {
            return $itemInCart;
        }

        return [];
    }

    protected function getItemInUserCartLimit()
    {
        $itemInCart = $this->CartModel->getItemInUserCartLimit(5);
        if ($itemInCart) {
            return $itemInCart;
        }

        return [];
    }

    public function getJsonItemInUserCart()
    {
        return json_encode($this->getItemInUserCart(), JSON_PRETTY_PRINT);
    }

    public function getJsonItemGroupByVendor($itemCanProcess = false)
    {
        return json_encode($this->getItemGroupByVendor($itemCanProcess), JSON_PRETTY_PRINT);
    }

    protected function isItemInCart($productId)
    {
        return $this->CartModel->isItemInCart($productId);
    }

    public function getItemGroupByVendor($itemCanProcess)
    {
        return $this->CartModel->getItemGroupByVendor($itemCanProcess);
    }

    public function deleteItemInCart($productId)
    {
        return $this->CartModel->deleteItemInCart($productId);
    }

    public function updateProcessItemIntoTransaction($productId, $processIntoTransaction)
    {
        $this->CartModel->updateProcessItemIntoTransaction($productId, $processIntoTransaction);
    }
}
