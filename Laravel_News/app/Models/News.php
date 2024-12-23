<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'content',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
