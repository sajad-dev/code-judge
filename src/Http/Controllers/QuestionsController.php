<?php

namespace SajadDev\CodeJudge\Http\Controllers;

use SajadDev\CodeJudge\Http\Requests\QuestionStoreRequest;
use SajadDev\CodeJudge\Http\Requests\QuestionUpdateRequest;
use SajadDev\CodeJudge\Interface\QuestionsInterface;

class QuestionsController extends Controller
{
    public function __construct(
        protected QuestionsInterface $questions
    ) {}

    public function index()
    {
        return response()->json($this->questions->all());
    }

    public function show($id)
    {
        return response()->json($this->questions->show($id));
    }

    public function store(QuestionStoreRequest $request)
    {
        $request["examples"] = json_encode($request->examples);
        return response()->json($this->questions->create($request->all()));
    }
    public function update($id, QuestionUpdateRequest $request)
    {
        $request["examples"] = json_encode($request->examples);
        return response()->json($this->questions->update($request->all(), $id));
    }

    public function destroy($id)
    {
        $this->questions->delete($id);
        return response("", 204);
    }
}
