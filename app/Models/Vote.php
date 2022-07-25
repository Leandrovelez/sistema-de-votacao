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
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Format the end_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Format the start_time.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    /**
     * Format the end_time.
     *
     * @param  string  $value
     * @return string
     */
    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    

    /**
     * Format the start_time.
     *
     * @param  string  $value
     * @return string
     */
    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = Carbon::createFromFormat('H:i', $value);
    }

    /**
     * Format the end_time.
     *
     * @param  string  $value
     * @return string
     */
    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = Carbon::createFromFormat('H:i', $value);
    }

}
