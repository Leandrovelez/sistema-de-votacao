<?php

namespace App\Repositories\Vote;

use App\Interfaces\Vote\VoteRepositoryInterface;
use App\Models\Vote;

class VoteRepository implements VoteRepositoryInterface 
{
    public function getAllVotes() 
    {
        return Vote::all();
    }

    public function getVoteById($voteId) 
    {
        return Vote::with('options')->findOrFail($voteId);
    }

    public function createVote($voteDetails) 
    {
        $vote = new Vote;
        $vote->title = $voteDetails->title;
        $vote->start_date = $voteDetails->start_date;
        $vote->end_date = $voteDetails->end_date;
        $vote->save();

        return ($vote);
    }

    public function updateVote($voteId, $newDetails) 
    {
        $vote = Vote::find($voteId);
        $vote->title = $newDetails->title;
        $vote->start_date = $newDetails->start_date;
        $vote->end_date = $newDetails->end_date;
        $vote->save();

        return $vote;
    }
    
    public function deleteVote($voteId) 
    {
        Vote::destroy($voteId);
    }
}
