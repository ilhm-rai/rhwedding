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

    public function addItemToCart()
    {
        $productId = $this->request->getVar('product_id');
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
        $itemInCart = $this->CartModel->getItemInUserCart(5);
        if ($itemInCart) {
            return $itemInCart;
        }

        return [];
    }

    public function getJsonItemInUserCart()
    {
        return json_encode($this->getItemInUserCartLimit(), JSON_PRETTY_PRINT);
    }

    protected function isItemInCart($productId)
    {
        return $this->CartModel->isItemInCart($productId);
    }

    public function getItemGroupByVendor()
    {
        return $this->CartModel->getItemGroupByVendor();
    }
}
