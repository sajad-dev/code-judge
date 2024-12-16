<?php

namespace SajadDev\CodeJudge\Http\Controllers;

use SajadDev\CodeJudge\Http\Requests\ArbitrationStoreRequest;
use SajadDev\CodeJudge\Http\Requests\ArbitrationUpdateRequest;
use SajadDev\CodeJudge\Interface\ArbitrationRepositoryInterface;

class ArbitrationController extends Controller
{
    public function __construct(
        protected ArbitrationRepositoryInterface $questions
    ) {}

    public function index()
    {
        return response()->json($this->questions->all());
    }

    public function show($id)
    {
        return response()->json($this->questions->show($id));
    }

    public function store(ArbitrationStoreRequest $request)
    {
        $request["input"]=json_encode($request->input);
        $request["output"] = json_encode($request->output);
        return response()->json($this->questions->create($request->all()));
    }
    public function update($id, ArbitrationUpdateRequest $request)
    {
        $request["input"] = json_encode($request->input);
        $request["output"] = json_encode($request->output);
        return response()->json($this->questions->update($request->all(), $id));
    }

    public function destroy($id)
    {
        $this->questions->delete($id);
        return response("", 204);
    }

}
