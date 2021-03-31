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
        $userId = $this->request->getVar('user_id');
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

        if ($this->getItemInUserCart($cartId)) {
            $this->CartModel->addItemToCart($data);
        }

        $cartItem = $this->getItemInUserCart($cartId);

        return json_encode(count($cartItem));
    }

    protected function getUserCart()
    {
        return $this->CartModel->getUserCart();
    }

    protected function getItemInUserCart($cart_id)
    {
        $itemInCart = $this->CartModel->getItemInUserCart($cart_id);
        if ($itemInCart) {
            return $itemInCart;
        }

        return true;
    }
}
