<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Law extends Model
{
    use HasUuids;

    protected function casts()
    {
        return [
            'valid_from' => 'datetime',
            'valid_until' => 'datetime',
        ];
    }

    protected function allegations(): HasMany
    {
        return $this->HasMany(Allegation::class);
    }
}
