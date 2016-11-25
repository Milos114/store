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

        $this->updateTags($attributes);
    }

    /**
     * @param $attributes
     */
    private function updateTags($attributes)
    {
        $tagsArray = $attributes['tags'] ?? [];
        $this->tags()->sync($tagsArray);
    }
}
