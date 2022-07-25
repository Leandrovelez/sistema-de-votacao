<?php

namespace App\Interfaces\Vote;

interface VoteRepositoryInterface 
{
    public function getAllVotes();
    public function getVoteById($voteId);
    public function deleteVote($voteId);
    public function createVote($voteDetails);
    public function updateVote($newDetails);
}