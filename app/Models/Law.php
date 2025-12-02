<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Law extends Model
{
    use HasUuids;
    protected $guarded = ["id", "created_at", "updated_at"];

    public $with = ["allegations"];
    protected function casts()
    {
        return [
            'valid_from' => 'datetime',
            'valid_until' => 'datetime',
        ];
    }

    public function allegations(): HasMany
    {
        return $this->HasMany(Allegation::class);
    }

    public function legalField() :BelongsTo
    {
        return $this->belongsTo(LegalField::class);
    }
}
