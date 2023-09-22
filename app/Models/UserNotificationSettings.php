<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotificationSettings extends Model
{
    use HasFactory;

    /**
     * Get Setting User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
