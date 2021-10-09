<?php

namespace App\Repositories\Interfaces;

use App\Models\Feedback;

interface FeedbackInterface
{
    public function getAll();
    public function addNew($feedback);
    public function update($feedback, $id);
    public function delete($feedback);
    public function getById($id);
}