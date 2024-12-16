<?php

namespace SajadDev\CodeJudge\Interface;

interface ArbitrationInterface
{
    public static function putFile($file, $folder_name): string;
    public static function putDockerFile($extension, $path): void;
    public static function runCode($path, $lable,$input,$time): string;
    public static function checkScore($questions_id, $path, $lable, $type): void;
}
