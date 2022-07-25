<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function option(){
        return $this->belongsTo(Option::class);
    }

    public function vote(){
        return $this->belongsTo(Vote::class);
    }
}
