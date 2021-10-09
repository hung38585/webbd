<?php

namespace App\Repositories\Repos;

use App\Models\Infomation;
use App\Repositories\Interfaces\InfomationInterface;

class InfomationRepository implements InfomationInterface
{
    public function getAll()
    {
        return Infomation::first();
    }
    public function update($infomationData, $id)
    {
        $infomation = $this->getById($id); 
        $currentVideo = $infomation->video;
        $infomation->name = $infomationData['name'];
        $infomation->phone = $infomationData['phone'];
        $infomation->mail = $infomationData['mail'];
        $infomation->address = $infomationData['address'];
        $infomation->facebook = $infomationData['facebook'];

        if (!empty($infomationData['video'])) {
            $videoName = $infomationData['video']->getClientOriginalName();
            $videoExtension = $infomationData['video']->getClientOriginalExtension();
            $videoName = $this->checkVideo($videoName, $videoExtension);
            $infomationData['video']->move('videos', $videoName);
            $infomation->video = $videoName;
        }
        
        $infomation->update();
        if (!empty($infomationData['video'])) {
            $this->deleteVideo($currentVideo);
        }    
        return $infomation;
    }
    public function getById($id)
    {
        $infomation = Infomation::findOrFail($id);
        return $infomation;
    }
    public function checkVideo($videoPath, $videoExtension)
    {
        $videoName = pathinfo($videoPath, PATHINFO_FILENAME);
        $path = public_path('videos');
        $listImage = scandir($path);
        $i = 1;
        while (in_array($videoPath, $listImage)) {
            $videoPath = $videoName . '_' . $i . '.' . $videoExtension;
            $i++;
        }
        return $videoPath;
    }
    public function deleteVideo($videoName)
    {
        $videoPath = public_path('videos/' . $videoName);
        unlink($videoPath);
        return;
    }
}