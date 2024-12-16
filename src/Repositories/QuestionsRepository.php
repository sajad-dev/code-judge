<?php

namespace SajadDev\CodeJudge\Repositories;


use Illuminate\Support\Arr;
use SajadDev\CodeJudge\Interface\QuestionsInterface;
use SajadDev\CodeJudge\Models\Questions;

class QuestionsRepository implements QuestionsInterface
{
    public function all()
    {
        return Questions::all();
    }

    public function create($data)
    {
        $data = Arr::only($data, ["folder_name", "title", "descriptions", "examples"]);
        return Questions::create($data);
    }

    public function update($data, $id)
    {
        $data = Arr::only($data, ["folder_name", "title", "descriptions", "examples"]);
        return Questions::find($id)->update($data);
    }

    public function delete($id)
    {
        Questions::destroy($id);
    }

    public function show($id)
    {
        return Questions::find($id);
    }
}
