<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LegalField extends Model
{
    use HasUuids;
    protected $guarded = ["id", "created_at", "updated_at"];

    public function laws(): HasMany
    {
        return $this->hasMany(Law::class);
    }
}
