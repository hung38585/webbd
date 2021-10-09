<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $guarded = ['id'];
    protected $timestamp = true;

    public function getAll($quantity)
    {
        return News::orderBy('created_at', 'desc')->paginate($quantity)->appends(request()->query());
    }
    public function create($newData)
    {
        $imageName = $newData['image']->getClientOriginalName();
        $imageExtension = $newData['image']->getClientOriginalExtension();
        $imageName = $this->checkImage($imageName, $imageExtension);
        $newData['image']->move('images', $imageName);
        $new = new News;
        $new->title = $newData['title'];
        $new->slug = Str::slug($newData['title']);
        $new->content = $newData['content'];
        $new->image = $imageName;
        // $new->created_by = Auth::guard('admin')->user()->id;
        $new->save();
        return $new;
    }
    public function edit($newData, $id)
    {
        $new = $this->getById($id); 
        $new->title = $newData['title'];
        $new->slug = Str::slug($newData['title']);
        $new->content = $newData['content'];
        if (isset($newData['image'])) {
            $this->deleteImage($new->image);
            $imageName = $newData['image']->getClientOriginalName();
            $imageExtension = $newData['image']->getClientOriginalExtension();
            $imageName = $this->checkImage($imageName, $imageExtension);
            $newData['image']->move('images', $imageName);
            $new->image = $imageName;
        }
        $new->update();
        return $new;
    }
    public function getById($id)
    {
        $new = News::findOrFail($id);
        return $new;
    }
    public function remove($id)
    {
        $new = News::findOrFail($id);
        $this->deleteImage($new->image);
        return $new->delete();
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
    public function getByTitle($slug)
    {
        $new = News::where('slug', $slug)->first();
        return $new;
    }
}
