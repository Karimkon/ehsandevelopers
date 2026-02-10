<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageContent extends Model
{
    protected $fillable = ['section', 'key', 'value', 'type', 'label'];

    public static function getSection(string $section): array
    {
        return Cache::remember("page_content.{$section}", 3600, function () use ($section) {
            return static::where('section', $section)->pluck('value', 'key')->toArray();
        });
    }

    public static function getValue(string $section, string $key, string $default = ''): string
    {
        $data = static::getSection($section);
        return $data[$key] ?? $default;
    }

    public static function clearCache(string $section = null): void
    {
        if ($section) {
            Cache::forget("page_content.{$section}");
        } else {
            $sections = static::distinct('section')->pluck('section');
            foreach ($sections as $s) {
                Cache::forget("page_content.{$s}");
            }
        }
    }
}
