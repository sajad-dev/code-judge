<?php

namespace SajadDev\CodeJudge\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use SajadDev\CodeJudge\Services\Arbitration;

class ParticipantsJob implements ShouldQueue
{
    use Queueable;

    protected $path;
    protected $lable;
    protected $questions_id;
    protected $extension;

    /**
     * Create a new job instance.
     */
    public function __construct($path, $lable, $questions_id, $extension)
    {
        $this->path = $path;
        $this->lable = $lable;
        $this->questions_id = $questions_id;
        $this->extension = $extension;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Arbitration::checkScore($this->questions_id, $this->path,  $this->lable, $this->extension);
    }
}
