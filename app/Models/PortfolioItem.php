<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'featured_image',
        'client_name', 'project_url', 'images', 'technologies',
        'service_category_id', 'is_featured', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'technologies' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->title);
            }
        });
    }
}
