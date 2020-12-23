<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
        'content',
        'published_at',
        'image',
        'category_id',
        'user_id'
    ];

    protected $dates = [
        'published_at'
    ];

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }


    /**
     * delete post image from storage
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * If post has tag return the id's as an array
     * @return bool
     */
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return only published posts
     * @return 
     */
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
           return $query->published();
        }

        return $query->published()->where('title', 'like', "%{$search}%");
    }
}
