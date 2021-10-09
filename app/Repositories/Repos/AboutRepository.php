<?php

namespace App\Repositories\Repos;

use App\Models\About;
use App\Repositories\Interfaces\AboutInterface;
use Illuminate\Support\Str;

class AboutRepository implements AboutInterface
{
    public function getAll()
    {
        return About::orderBy('created_at', 'desc')->get();
    }
    public function addNew($aboutData)
    {
        $imageName = $aboutData['image']->getClientOriginalName();
        $imageExtension = $aboutData['image']->getClientOriginalExtension();
        $imageName = $this->checkImage($imageName, $imageExtension);
        $aboutData['image']->move('images', $imageName);
        $about = new About;
        $about->content = $aboutData['content'];
        $about->image = $imageName;
        // $about->created_by = Auth::guard('admin')->user()->id;
        $about->save();
        return $about;
    }
    public function update($aboutData, $id)
    {
        $about = $this->getById($id); 
        $about->content = $aboutData['content'];
        if (isset($aboutData['image'])) {
            $this->deleteImage($about->image);
            $imageName = $aboutData['image']->getClientOriginalName();
            $imageExtension = $aboutData['image']->getClientOriginalExtension();
            $imageName = $this->checkImage($imageName, $imageExtension);
            $aboutData['image']->move('images', $imageName);
            $about->image = $imageName;
        }
        $about->update();
        return $about;
    }
    public function delete($id)
    {
        $about = About::findOrFail($id);
        $this->deleteImage($about->image);
        return $about->delete();
    }
    public function getById($id)
    {
        $about = About::findOrFail($id);
        return $about;
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