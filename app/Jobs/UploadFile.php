<?php

namespace App\Jobs;

use App\Models\Hobby;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadFile implements ShouldQueue
{
    use Queueable;

    protected $tempPath;
    protected $fileName;
    protected $hobbyId;

    public function __construct($tempPath, $fileName, $hobbyId)
    {
        $this->tempPath = $tempPath;
        $this->fileName = $fileName;
        $this->hobbyId = $hobbyId;
    }

    public function handle(): void
    {
        $sourcePath = storage_path('app/private/' . $this->tempPath);
        $destination = 'hobbies/' . $this->fileName;

        // Streaming: buka file lalu kirim ke lokasi tujuan
        $stream = fopen($sourcePath, 'r');
        Storage::put($destination, $stream);
        fclose($stream);

        // Update model
        $hobby = Hobby::find($this->hobbyId);
        if ($hobby) {
            $hobby->update([
                'file' => $destination,
            ]);
        }

        // Hapus file sementara
        Storage::delete($this->tempPath);

        Log::info('berhasil');
    }
}

