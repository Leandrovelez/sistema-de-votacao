<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\Answer\AnswerRepositoryInterface;

class AnswerController extends Controller
{
    private $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepositoryInterface) 
    {
        $this->answerRepository = $answerRepositoryInterface;
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = $this->answerRepository->createAnswer($request->voteId, $request->optionId);
        return redirect()->route('vote.index')->with('success', 'Votação respondida com sucesso!');
    }

    
}
