<?php

namespace App\Repositories\Option;

use App\Interfaces\Option\OptionRepositoryInterface;
use App\Models\Option;

class OptionRepository implements OptionRepositoryInterface 
{
    public function getAllOptions() 
    {
        return Option::all();
    }

    public function getOptionById($optionId) 
    {
        return Option::findOrFail($optionId);
    }

    public function createOption($optionDetails) 
    {
        $option = new Option;
        $option->vote_id = $optionDetails->vote_id;
        $option->content = $optionDetails->content;
        $option->save();

        return $option;
    }

    public function updateOption($optionId, $newDetails) 
    {
        $option = Option::find($optionId);
        $option->vote_id = $newDetails->vote_id;
        $option->content = $newDetails->content;
        $option->save();

        return $option;
    }
    
    public function deleteOption($optionId) 
    {
        return Option::destroy($optionId);
    }
}
