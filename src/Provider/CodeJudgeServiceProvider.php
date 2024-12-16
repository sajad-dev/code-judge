<?php

namespace SajadDev\CodeJudge\Provider;

use Illuminate\Support\ServiceProvider;
use SajadDev\CodeJudge\Interface\ArbitrationInterface;
use SajadDev\CodeJudge\Interface\ArbitrationRepositoryInterface;
use SajadDev\CodeJudge\Interface\ParticipantsInterface;
use SajadDev\CodeJudge\Interface\QuestionsInterface;
use SajadDev\CodeJudge\Repositories\ArbitrationRepository;
use SajadDev\CodeJudge\Repositories\ParticipantsRepository;
use SajadDev\CodeJudge\Repositories\QuestionsRepository;
use SajadDev\CodeJudge\Services\Arbitration;

class CodeJudgeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            QuestionsInterface::class,
            QuestionsRepository::class
        );
        $this->app->bind(
            ArbitrationRepositoryInterface::class,
            ArbitrationRepository::class
        );
        $this->app->bind(
            ParticipantsInterface::class,
            ParticipantsRepository::class
        );
        $this->app->bind(
            ArbitrationInterface::class,
            Arbitration::class
        );
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/arbitration.php',
            'arbitration'
        );
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');
        $this->publishes([
            __DIR__ . '/../Config/arbitration.php' => config_path('arbitration.php'),
        ], 'config');
    }
}
