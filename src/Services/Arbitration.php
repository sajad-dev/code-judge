<?php

namespace SajadDev\CodeJudge\Services;


use Illuminate\Support\Facades\Storage;
use SajadDev\CodeJudge\Interface\ArbitrationInterface;
use SajadDev\CodeJudge\Repositories\ArbitrationRepository;
use SajadDev\CodeJudge\Repositories\ParticipantsRepository;

class Arbitration implements ArbitrationInterface
{
    public static function putFile($file, $folder_name): string
    {
        $ex = $file->getClientOriginalExtension();

        $file->storeAs("$ex/$folder_name", "main.$ex", options: 'public');

        $publicPath = Storage::disk("public")->path("$ex/$folder_name");
        return  $publicPath;
    }

    public static function putDockerFile($extension, $path): void
    {
        $docker_path = realpath(path: "dockerFiles" . DIRECTORY_SEPARATOR . $extension);
        exec("cp $docker_path $path/dockerfile");
    }

    public static function runCode($path, $lable, $input, $time): string
    {

        exec("sudo docker build -t $lable $path");

        $run_container = "sudo docker run -i --rm $lable";


        $command = escapeshellcmd($run_container);
        set_time_limit($time / 1000);
        $input_str = "";
        foreach ($input as $key => $value) {
            $val = escapeshellarg($value);
            $input_str = $input_str . "echo $val|";
        }

        $output = shell_exec($input_str  . $command);
        return $output;
    }

    public static function checkScore($questions_id, $path, $lable, $type): void
    {
        $participants = new ParticipantsRepository();
        
        $arbitration = new ArbitrationRepository();
        $arbitration_qu = $arbitration->findWithQuestionsID($questions_id);
        $arbitration_output = json_decode($arbitration_qu->output);
        $score = 0;
        $log = "";

        $url = Storage::url("public/$type/$lable");

        foreach (json_decode($arbitration_qu->input) as $key => $value) {
            $output =  self::runCode($path, $lable, $value, $arbitration_qu->time);
            $output = explode("\n", $output);
            $output = array_values(array_filter($output));

            if ($output == $arbitration_output[$key]) {
                $score += 100 / count($arbitration_output);
                $log = $log . "successfully \n ";
            }

            if ($output == null) {
                $log = $log . "Error Or Time limited \n";
            }
        }
        
        $participants->create(["questions_id" => $questions_id, "path" => $url, "type" => $type, "score" => $score, "log" => $log]);
    }
}
