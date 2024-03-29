<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vote\CreateVoteRequest;
use App\Http\Requests\Vote\UpdateVoteRequest;
use App\Interfaces\Vote\VoteRepositoryInterface;
use App\Interfaces\Option\OptionRepositoryInterface;
use App\Interfaces\Answer\AnswerRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    private $voteRepository;
    private $optionRepository;
    private $answerRepository;

    public function __construct(VoteRepositoryInterface $voteRepositoryInterface, OptionRepositoryInterface $optionRepositoryInterface, AnswerRepositoryInterface $answerRepositoryInterface) 
    {
        $this->voteRepository = $voteRepositoryInterface;
        $this->optionRepository = $optionRepositoryInterface;
        $this->answerRepository = $answerRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = $this->voteRepository->getAllVotes();
        return view('vote.index', compact('votes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateVoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVoteRequest $request)
    {
        $request->flash();
        $nullArray = [null];
        if(count(array_diff($request->option, $nullArray)) < 3){
            return redirect()->back()->withErrors(['msg' => 'Cadastre ao menos 3 opções de resposta!'])->withInput();
        }
        if(in_array(null, $request->option, true)){
            return redirect()->back()->withErrors(['msg' => 'A opção de resposta não pode ser vazia!'])->withInput();
        }

        $options = $request->option;
        
        $vote = $this->voteRepository->createVote($request);
        $option = $this->optionRepository->createOption($vote->id, $options);
        return redirect()->route('vote.index')->with('success', 'Votação cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vote = $this->voteRepository->getVoteById($id);
        $options = $this->optionRepository->getOptionsByVoteId($vote->id);
        $answers = $this->answerRepository->getAnswersByVoteId($vote->id);
        return view('vote.show', compact('vote', 'options', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vote = $this->voteRepository->getVoteById($id);
        $options = $this->optionRepository->getOptionsByVoteId($id);
        return view('vote.edit', compact('vote', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateVoteRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoteRequest $request)
    { 
        $nullArray = [null];
        if(count(array_diff($request->option, $nullArray)) < 3){
            return redirect()->back()->withErrors(['msg' => 'Cadastre ao menos 3 opções de resposta!']);
        }
        if(in_array(null, $request->option, true)){
            return redirect()->back()->withErrors(['msg' => 'A opção de resposta não pode ser vazia!'])->withInput();
        }
        
        $vote = $this->voteRepository->updateVote($request);
        $options = $request->option;
        $option = $this->optionRepository->updateOption($vote->id, $options);
        
        return redirect()->route('vote.index')->with('success', 'Votação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vote = $this->voteRepository->deleteVote($id);
        return redirect()->route('vote.index')->with('success', 'Votação deletada com sucesso!');
    }

    /**
     * Display the specified vote.
     *
     * @param  int  $id
     */
    public function voting($id)
    {
        $vote = $this->voteRepository->getVoteById($id);
        $options = $this->optionRepository->getOptionsByVoteId($id);
        return view('vote.voting', compact('vote', 'options'));
    }
}
