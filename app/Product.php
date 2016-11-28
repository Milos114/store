<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'product_details'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @param array $attributes
     */
    public function fillIn($attributes)
    {
        $this->update($attributes);

        $this->updateTags($attributes['tags'] ?? []);

        if (isset($attributes['image'])) {
            $this->saveImage($attributes['image']);
        }
    }

    /**
     * @param array $tags
     */
    private function updateTags($tags)
    {
        $this->tags()->sync($tags);
    }

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
