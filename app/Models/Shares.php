<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shares extends Model
{
    use HasFactory;
    protected $table = 'shares';
    protected $guarded = ['id'];
    protected $timestamp = true;

    public function getAll($quantity)
    {
        return Shares::orderBy('created_at', 'desc')->paginate($quantity)->appends(request()->query());
    }
    public function create($shareData)
    {
        $imageName = $shareData['image']->getClientOriginalName();
        $imageExtension = $shareData['image']->getClientOriginalExtension();
        $imageName = $this->checkImage($imageName, $imageExtension);
        $shareData['image']->move('images', $imageName);
        $share = new Shares;
        $share->title = $shareData['title'];
        $share->slug = Str::slug($shareData['title']);
        $share->content = $shareData['content'];
        $share->image = $imageName;
        // $share->created_by = Auth::guard('admin')->user()->id;
        $share->save();
        return $share;
    }
    public function edit($shareData, $id)
    {
        $share = $this->getById($id); 
        $share->title = $shareData['title'];
        $share->slug = Str::slug($shareData['title']);
        $share->content = $shareData['content'];
        if (isset($shareData['image'])) {
            $this->deleteImage($share->image);
            $imageName = $shareData['image']->getClientOriginalName();
            $imageExtension = $shareData['image']->getClientOriginalExtension();
            $imageName = $this->checkImage($imageName, $imageExtension);
            $shareData['image']->move('images', $imageName);
            $share->image = $imageName;
        }
        $share->update();
        return $share;
    }
    public function getById($id)
    {
        $share = Shares::findOrFail($id);
        return $share;
    }
    public function remove($id)
    {
        $share = Shares::findOrFail($id);
        $this->deleteImage($share->image);
        return $share->delete();
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
        $share = Shares::where('slug', $slug)->first();
        return $share;
    }
}
