<?php

namespace App\Interfaces\Answer;

interface AnswerRepositoryInterface 
{
    public function getAllAnswers();
    public function getAnswerById($answerId);
    public function getAnswersByVoteId($voteId);
    public function deleteAnswer($answerId);
    public function createAnswer($voteId, $answerId);
    public function updateAnswer($voteId, $answerId);
}