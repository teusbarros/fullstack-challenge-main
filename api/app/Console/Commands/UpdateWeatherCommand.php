<?php

namespace App\Console\Commands;

use App\Jobs\MakeApiRequest;
use App\Models\User;
use Illuminate\Console\Command;

class UpdateWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create jobs to update every user weather';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        foreach (User::all() as $key => $user) {
            MakeApiRequest::dispatch($user->id, $user->latitude, $user->longitude);
        }
    }
}
