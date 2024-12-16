<?php

namespace SajadDev\CodeJudge\Repositories;


use Illuminate\Support\Arr;
use SajadDev\CodeJudge\Interface\ParticipantsInterface;
use SajadDev\CodeJudge\Models\Participants;

class ParticipantsRepository implements ParticipantsInterface
{
    public function all()
    {
        return Participants::all();
    }

    public function create($data)
    {
        $data = Arr::only($data, ["questions_id", "path", "type", "log", "score"]);
        return Participants::create($data);
    }

    public function update($data, $id)
    {
        $data = Arr::only($data, ["questions_id", "path", "type", "log", "score"]);
        return Participants::find($id)->update($data);
    }

    public function delete($id)
    {
        Participants::destroy($id);
    }

    public function show($id)
    {
        return Participants::find($id);
    }
}
