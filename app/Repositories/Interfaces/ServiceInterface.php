<?php

namespace App\Repositories\Interfaces;

interface ServiceInterface
{
    public function getAll();
    public function addNew($service);
    public function update($service, $id);
    public function delete($service);
    public function getById($id);
}