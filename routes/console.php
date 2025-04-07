<?php

use App\Console\Commands\MigrateFreshAndSeeder;
use App\Jobs\CreateHobby;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('app:migrate-fresh-and-seeder')->everyFiveMinutes();

Schedule::job(new CreateHobby)->everyMinute();

