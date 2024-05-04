<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evolution extends Model
{
    protected $table = 'clinic_evolutions';

    public function clinic_history(): BelongsTo
    {
        return $this->belongsTo(History::class);
    }
    use HasFactory;
}
