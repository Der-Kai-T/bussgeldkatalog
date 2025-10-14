<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Allegation extends Model
{
    use HasUuids;

    public function law()
    {
        return $this->belongsTo(Law::class);
    }

    protected function casts()
    {
        return [
            'valid_from' => 'datetime',
        ];
    }
}
