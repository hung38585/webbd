<?php

namespace App\Repositories\Interfaces;

interface AboutInterface
{
    public function getAll();
    public function addNew($about);
    public function update($about, $id);
    public function delete($about);
    public function getById($id);
}