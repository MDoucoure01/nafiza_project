<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\CreateUserNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendMailBienvenue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
<<<<<<< HEAD
         $this->user->notify(new CreateUserNotification($this->user));
=======
        $this->user->notify(new CreateUserNotification($this->user));
>>>>>>> 96f978c841ca6110f6bf14dfeebf4dd005bd405b
    }
}
