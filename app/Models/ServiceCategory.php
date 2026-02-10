<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'color', 'description', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function activeServices()
    {
        return $this->hasMany(Service::class)->where('is_active', true)->orderBy('sort_order');
    }
}
