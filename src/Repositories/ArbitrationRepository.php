<?php

namespace SajadDev\CodeJudge\Repositories;


use Illuminate\Support\Arr;
use SajadDev\CodeJudge\Interface\ArbitrationRepositoryInterface;
use SajadDev\CodeJudge\Models\Arbitration;

class ArbitrationRepository implements ArbitrationRepositoryInterface
{
    public function all()
    {
        return Arbitration::all();
    }

    public function create($data)
    {
        $data = Arr::only($data, ["questions_id", "input", "output", "time"]);
        return Arbitration::create($data);
    }

    public function update($data, $id)
    {
        $data = Arr::only($data, ["questions_id", "input", "output", "time"]);
        return Arbitration::find($id)->update($data);
    }

    public function delete($id)
    {
        Arbitration::destroy($id);
    }

    public function show($id)
    {
        return Arbitration::find($id);
    }

    public function findWithQuestionsID($id)
    {
        return Arbitration::query()->where("questions_id", $id)->first();
    }
}
