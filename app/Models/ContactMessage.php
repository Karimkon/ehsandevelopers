<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'inquiry_type', 'status', 'admin_response', 'responded_at'];

    protected function casts(): array
    {
        return ['responded_at' => 'datetime'];
    }
}
