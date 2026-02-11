<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrustedClient extends Model
{
    protected $fillable = ['name', 'industry', 'logo', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
