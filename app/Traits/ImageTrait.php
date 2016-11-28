<?php

namespace App\Traits;


trait ImageTrait
{
    /**
     * @param \Illuminate\Http\UploadedFile $images
     */
    private function saveImage($images)
    {
        foreach ($images as $image) {
            $image->storeAs('product', auth()->user()->id . '/' . uniqid() . $this->sanitizedName($image));
        }
    }

    /**
     * @param  $image
     * @return string
     */
    private function sanitizedName($image)
    {
        $name = str_slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), '_');
        $ext = str_slug((pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION)));

        return $name . '.' . $ext;
    }
}