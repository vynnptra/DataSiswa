<?php

namespace App\Jobs;

use App\Models\Hobby;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class CreateHobby
{

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = [
            'football', 'cooking', 'swiming', 'singging', 'run', 'sleep', 'reading', 'painting', 'gaming', 'guitar'
        ];

        Hobby::create([
            'name' => Arr::random($data),
        ]);


    }
}
