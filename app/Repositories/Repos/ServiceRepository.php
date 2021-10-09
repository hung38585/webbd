<?php

namespace App\Repositories\Repos;

use App\Models\Service;
use App\Repositories\Interfaces\ServiceInterface;
use Illuminate\Support\Str;

class ServiceRepository implements ServiceInterface
{
    public function getAll()
    {
        return Service::orderBy('created_at', 'desc')->get();
    }
    public function addNew($serviceData)
    {
        $service = new Service;
        $service->name_vi = $serviceData['name_vi'];
        $service->name_en = $serviceData['name_en'];
        $service->description_vi = $serviceData['description_vi'];
        $service->description_en = $serviceData['description_en'];
        $service->icon = $serviceData['icon'];
        // $service->created_by = Auth::guard('admin')->user()->id;
        $service->save();
        return $service;
    }
    public function update($serviceData, $id)
    {
        $service = $this->getById($id); 
        $service->name_vi = $serviceData['name_vi'];
        $service->name_en = $serviceData['name_en'];
        $service->description_vi = $serviceData['description_vi'];
        $service->description_en = $serviceData['description_en'];
        $service->icon = $serviceData['icon'];
        $service->update();
        return $service;
    }
    public function delete($id)
    {
        $service = Service::findOrFail($id);
        return $service->delete();
    }
    public function getById($id)
    {
        $service = Service::findOrFail($id);
        return $service;
    }
}