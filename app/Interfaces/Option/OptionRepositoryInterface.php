<?php

namespace App\Interfaces\Option;

interface OptionRepositoryInterface 
{
    public function getAllOptions();
    public function getOptionById($optionId);
    public function deleteOption($optionId);
    public function createOption($optionDetails);
    public function updateOption($optionId, $newDetails);
}