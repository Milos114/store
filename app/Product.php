<?php

namespace App;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use ImageTrait;

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
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * @param array $attributes
     */
    public function fillIn($attributes)
    {
        if ($this->exists) {
            $this->update($attributes);
        }

        $this->storeTags($attributes['tags'] ?? []);

        if (isset($attributes['image'])) {
            $this->saveImage($attributes['image']);
        }
    }

    /**
     * @param array $tags
     */
    private function storeTags($tags)
    {
        $this->tags()->sync($tags);
    }

    public function deleteProduct()
    {
        $this->delete();
        Storage::deleteDirectory('public/' . $this->id);
    }

}
