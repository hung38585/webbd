<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductInterface
{
    public function getAll($keyword, $productQuantity, $permission, $request);
    public function addNew($product);
    public function update($product, $id);
    public function delete($product);
    public function getById($id);
}