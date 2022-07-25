<?php

namespace App\Repositories\Vote;

use App\Interfaces\Vote\VoteRepositoryInterface;
use App\Models\Vote;

class VoteRepository implements VoteRepositoryInterface 
{
    public function getAllVotes() 
    {
        return Vote::paginate(5);
    }

    public function getVoteById($voteId) 
    {
        $vote = Vote::findOrFail($voteId);
        return $vote;
    }

    public function createVote($voteDetails) 
    {
        $vote = new Vote;
        $vote->title = $voteDetails->title;
        $vote->question = $voteDetails->question;
        $vote->start_date = $voteDetails->start_date;
        $vote->end_date = $voteDetails->end_date;
        $vote->start_time = $voteDetails->start_time;
        $vote->end_time = $voteDetails->end_time;
        $vote->save();

        return ($vote);
    }

    public function updateVote($newDetails) 
    {
        $voteId = $newDetails->id;
        $vote = Vote::find($voteId);
        $vote->title = $newDetails->title;
        $vote->question = $newDetails->question;
        $vote->start_date = $newDetails->start_date;
        $vote->end_date = $newDetails->end_date;
        $vote->start_time = $newDetails->start_time;
        $vote->end_time = $newDetails->end_time;
        $vote->save();

        return $vote;
    }
    
    public function deleteVote($voteId) 
    {
        Vote::destroy($voteId);
    }
}
