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

    public function getOptionsByVoteId($voteId) 
    {
        $options = Option::where('vote_id', $voteId)->get();
        return $options;
    }

    public function createOption($voteId, $options) 
    {
        foreach($options as $op){
            Option::create([
                'vote_id' => $voteId,
                'content' => $op
            ]);
        }
    }

    public function updateOption($voteId, $newDetails) 
    {
        $option = Option::where('vote_id', $voteId)->get();
        foreach($option as $key => $newOption){
            $newOption->update(['content' => $newDetails[$key]]);
        }
        
        return $option;
    }
    
    public function deleteOption($optionId) 
    {
        return Option::destroy($optionId);
    }
}
