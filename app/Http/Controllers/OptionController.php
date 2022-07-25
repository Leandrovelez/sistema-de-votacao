<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Interfaces\Option\OptionRepositoryInterface;
use App\Http\Requests\Option\CreateOptionRequest;
use App\Http\Requests\Option\UpdateOptionRequest;

class OptionController extends Controller
{
    private $optionRepository;

    public function __construct(OptionRepositoryInterface $optionRepositoryInterface) 
    {
        $this->optionRepository = $optionRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = $this->optionRepository->getAllOptions();
        return response()->json($options);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option = $this->optionRepository->createOption($request);
        return response()->json($option);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option = $this->optionRepository->getOptionById($id);
        return response()->json($option);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateOptionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionRequest $request, $id)
    {
        $option = $this->optionRepository->updateOption($id, $request);
        return response()->json($option);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = $this->optionRepository->deleteOption($id);
        return response()->json($option);
    }
}
