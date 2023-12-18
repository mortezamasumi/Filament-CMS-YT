<?php

namespace App\Services\Contracts;

interface CartManager
{
    public function add($productId, $variantId = null);
    public function exists();
    public function associateWithUser();

    public function remove(int $id);
    public function update();
    public function getCart();
    public function getSubtotal();
}
