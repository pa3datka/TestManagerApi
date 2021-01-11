<?php


namespace App\Services\ImageInterventionService;

use Intervention\Image\Facades\Image;

class ImageIntervention extends Image
{
    public function saveImage($image, $height = 400, $width = 500)
    {
        if (strlen($image) < 1) {
            return '';
        } else {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = $this->createNameImage($ext);
            $img = self::make($image)->resize($width, $height);
            $upload_path = storage_path('app/public/testImages');
            $image_url = $upload_path . '/' . $name;
            $img->save($image_url);
            return asset("storage/testImages/$name");
        }
    }

    private function createNameImage($ext): string
    {
        return hrtime(true) . '.' . $ext;
    }
}
