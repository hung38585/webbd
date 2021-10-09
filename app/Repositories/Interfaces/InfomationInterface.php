<?php

namespace App\Repositories\Interfaces;

use App\Models\Infomation;

interface InfomationInterface
{
    public function getAll();
    public function update($category, $id);
}