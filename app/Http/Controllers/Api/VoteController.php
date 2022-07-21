<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vote\CreateVoteRequest;
use App\Http\Requests\Vote\UpdateVoteRequest;
use App\Interfaces\Vote\VoteRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Vote;
use Carbon\Carbon;

class VoteController extends Controller
{
    private $voteRepository;

    public function __construct(VoteRepositoryInterface $voteRepositoryInterface) 
    {
        $this->voteRepository = $voteRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vote = $this->voteRepository->getAllVotes();
        return response()->json($vote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateVoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVoteRequest $request)
    {
        $vote = $this->voteRepository->createVote($request);
        return response()->json($vote);
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
        return response()->json($vote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateVoteRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoteRequest $request, $id)
    {
        $vote = $this->voteRepository->updateVote($id, $request);
        return response()->json($vote);
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
        return response()->json($vote);
    }
}
