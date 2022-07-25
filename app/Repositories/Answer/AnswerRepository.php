<?php

namespace App\Repositories\Answer;

use App\Interfaces\Answer\AnswerRepositoryInterface;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;

class AnswerRepository implements AnswerRepositoryInterface 
{
    public function getAllAnswers() 
    {
        return Answer::paginate(5);
    }

    public function getAnswerById($answerId) 
    {
        $answer = Answer::findOrFail($answerId);
        return ($answer);
    }

    public function createAnswer($voteId, $optionId) 
    {
        $answer = new Answer;
        $answer->vote_id = $voteId;
        $answer->option_id = $optionId;
        $answer->save();

        return ($answer);
    }

    public function updateAnswer($voteId, $answerId) 
    {
        //
    }
    
    public function deleteAnswer($answerId) 
    {
        Answer::destroy($answerId);
    }

    public function getAnswersByVoteId($voteId){
        $answersCount = [];
        //$answers = Answer::where('vote_id', $voteId)->select(DB::raw('answers.option_id, COUNT(option_id) as option_count'))->get();
        $answers = Answer::select(array('option_id', DB::raw('COUNT(option_id) as option_count')))
            ->where('vote_id', $voteId)
            ->groupBy('option_id')
            ->get();
        //indice = vote_id, value = count options
        //dd($answers);
        foreach($answers as $answer){
            $answersCount[$answer->option_id] = $answer->option_count;
        }
        //dd($answersCount);
        return $answersCount;
    }
}
