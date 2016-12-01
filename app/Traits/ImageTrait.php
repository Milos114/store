<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


trait ImageTrait
{
    /**
     * @param \Illuminate\Http\UploadedFile $images
     */
    public function saveImage($images)
    {
        if (is_array($images)) {
            foreach ($images as $image) {
                $image->storeAs('public', $this->id . '/' . uniqid() . $this->sanitizedName($image));
            }
            return;
        }

        $images->storeAs('public', $this->id . '/' . uniqid() . $this->sanitizedName($images));
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

    /**
     * Get images base name
     *
     * @return array
     */
    public function images()
    {
        $images = File::files(public_path('storage/' . $this->id));

        return array_map(function ($image) {
            return pathinfo($image, PATHINFO_BASENAME);
        }, $images);
    }

    /**
     * @param $images
     */
    public function deleteImages($images)
    {
        foreach ($images as $image) {
            Storage::delete('public/' . $this->id . '/' . $image);
        }
    }
}