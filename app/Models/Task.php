<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends BaseModel
{
    use HasFactory;

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
