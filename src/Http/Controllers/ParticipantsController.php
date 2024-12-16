<?php

namespace SajadDev\CodeJudge\Http\Controllers;

use SajadDev\CodeJudge\Http\Requests\UploadFileRequest;
use SajadDev\CodeJudge\Interface\ParticipantsInterface;
use SajadDev\CodeJudge\Jobs\ParticipantsJob;
use SajadDev\CodeJudge\Services\Arbitration;

class ParticipantsController extends Controller
{
    public function __construct(
        protected ParticipantsInterface $participants
    ) {}

    public function index()
    {
        return response()->json($this->participants->all());
    }

    public function show($id)
    {
        return response()->json($this->participants->show($id));
    }

    public function store(UploadFileRequest $request)
    {


        $file = $request->file("code");

        $path = Arbitration::putFile($file, "admin");
        $ex = $file->getClientOriginalExtension();
        Arbitration::putDockerFile($ex, $path);



        dispatch(new ParticipantsJob($path, "admin", $request->questions_id, $ex));

        return response()->json();
    }

    public function destroy($id) {
        $this->participants->delete($id);
        return response("", 204);

    }

}
