<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = ['reference_number', 'service_id', 'name', 'email', 'phone', 'company', 'budget_range', 'timeline', 'project_description', 'attachments', 'status', 'priority', 'admin_notes', 'quoted_amount'];

    protected function casts(): array
    {
        return [
            'attachments' => 'array',
            'quoted_amount' => 'decimal:2',
        ];
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public static function generateReferenceNumber(): string
    {
        $date = now()->format('Ymd');
        $last = static::where('reference_number', 'like', "ED-{$date}-%")->count();
        return sprintf('ED-%s-%04d', $date, $last + 1);
    }
}
