<?php

namespace App\Interfaces\Option;

interface OptionRepositoryInterface 
{
    public function getAllOptions();
    public function getOptionsByVoteId($voteId);
    public function deleteOption($optionId);
    public function createOption($voteId, $options);
    public function updateOption($voteId, $newDetails);
}