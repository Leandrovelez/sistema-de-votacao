<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Vote extends Model
{
    use HasFactory;

    /**
     * Get the options for the vote.
     */
    public function options() {
        return $this->hasMany(Option::class);
    }

    /**
     * Format the start_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i');
    }

    /**
     * Format the end_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i');
    }

    /**
     * Format the start_date.
     *
     * @param  string  $value
     * @return string
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y H:i', $value);
    }

    /**
     * Format the end_date.
     *
     * @param  string  $value
     * @return string
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d/m/Y H:i', $value);
    }

}
