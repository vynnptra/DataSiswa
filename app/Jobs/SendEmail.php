<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Queueable;

    protected $data;
    protected $hobbies;

    /**
     * Create a new job instance.
     */
    public function __construct($data, $hobbies)
    {
        $this->data = $data;
        $this->hobbies = $hobbies;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        Mail::send('mails.data-siswa', [ 'data' => $this->data, 'hobbies' => $this->hobbies], function ($message) {
            $message->to('superadmin@example.com')->subject('Siswa Baru');
        });

    }
}
