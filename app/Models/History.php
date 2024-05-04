<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    protected $table = 'clinic_histories';

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function professional(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
