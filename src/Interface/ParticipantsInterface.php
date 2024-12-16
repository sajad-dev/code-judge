<?php

namespace SajadDev\CodeJudge\Interface;

interface ParticipantsInterface
{
    public function all();

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function show($id);
}
