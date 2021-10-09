<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;

interface CategoryInterface
{
    public function getAll();
    public function addNew($category);
    public function update($category, $id);
    public function delete($category);
    public function getById($id);
}