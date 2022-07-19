<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    /**
     * Get the vote that owns the option.
     */
    public function vote() {
        return $this->belongsTo(Option::class);
    }
}
