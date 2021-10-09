<?php

namespace App\Repositories\Repos;

use App\Models\Feedback;
use App\Repositories\Interfaces\FeedbackInterface;
use Illuminate\Support\Str;

class FeedbackRepository implements FeedbackInterface
{
    public function getAll()
    {
        return Feedback::orderBy('created_at', 'desc')->get();
    }
    public function addNew($feedbackData)
    {
        $imageName = $feedbackData['image']->getClientOriginalName();
        $imageExtension = $feedbackData['image']->getClientOriginalExtension();
        $imageName = $this->checkImage($imageName, $imageExtension);
        $feedbackData['image']->move('images', $imageName);
        $feedback = new Feedback;
        $feedback->name = $feedbackData['name'];
        $feedback->description = $feedbackData['description'];
        $feedback->image = $imageName;
        // $feedback->created_by = Auth::guard('admin')->user()->id;
        $feedback->save();
        return $feedback;
    }
    public function update($feedbackData, $id)
    {
        $feedback = $this->getById($id); 
        $feedback->name = $feedbackData['name'];
        $feedback->description = $feedbackData['description'];
        if (isset($feedbackData['image'])) {
            $this->deleteImage($feedback->image);
            $imageName = $feedbackData['image']->getClientOriginalName();
            $imageExtension = $feedbackData['image']->getClientOriginalExtension();
            $imageName = $this->checkImage($imageName, $imageExtension);
            $feedbackData['image']->move('images', $imageName);
            $feedback->image = $imageName;
        }
        $feedback->update();
        return $feedback;
    }
    public function delete($id)
    {
        $feedback = feedback::findOrFail($id);
        $this->deleteImage($feedback->image);
        return $feedback->delete();
    }
    public function getById($id)
    {
        $feedback = feedback::findOrFail($id);
        return $feedback;
    }
    public function checkImage($imagePath, $imageExtension)
    {
        $imageName = pathinfo($imagePath, PATHINFO_FILENAME);
        $path = public_path('images');
        $listImage = scandir($path);
        $i = 1;
        while (in_array($imagePath, $listImage)) {
            $imagePath = $imageName . '_' . $i . '.' . $imageExtension;
            $i++;
        }
        return $imagePath;
    }
    public function deleteImage($imageUrl)
    {
        $imagePath = public_path('images/' . $imageUrl);
        unlink($imagePath);
    }
}