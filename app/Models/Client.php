<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Comment\Doc;

class Client extends BaseModel
{
    use HasFactory;

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);

    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
