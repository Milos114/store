<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


trait ImageTrait
{
    public $sanitizedName;

    /**
     * @param \Illuminate\Http\UploadedFile $images
     */
    public function saveImage($images)
    {
        if (is_array($images)) {
            foreach ($images as $image) {
                $uniqueId = $this->uniqueString();
                $image->storeAs('public', $this->id . '/' . $uniqueId . $this->sanitizedName($image));
                $this->images()->create(['url' => $uniqueId . $this->sanitizedName]);
            }
            return;
        }

        $uniqueId = $this->uniqueString();

        $images->storeAs('public', $this->id . '/' . $uniqueId . $this->sanitizedName($images));
        $this->images()->create(['url' => $uniqueId . $this->sanitizedName]);
    }

    /**
     * @param  $image
     * @return string
     */
    private function sanitizedName($image)
    {
        $name = str_slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), '_');
        $ext = str_slug((pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION)));

        $this->sanitizedName = $name . '.' . $ext;
        return $name . '.' . $ext;
    }

    /**
     * @param $images
     */
    public function deleteImages($images)
    {
        foreach ($images as $image) {
            Storage::delete('public/' . $this->id . '/' . $image);
        }

        $this->images()->whereIn('url', $images)->delete();
    }

    /**
     * @return string
     */
    public function uniqueString()
    {
        return uniqid();
    }
}