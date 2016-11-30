<?php

namespace App\Traits;


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
}