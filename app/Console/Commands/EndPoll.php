<?php

namespace App\Console\Commands;

use App\Enums\PollStatus;
use App\Models\Poll;
use Illuminate\Console\Command;

class EndPoll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'poll:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Poll::query()->where('status', PollStatus::STARTED->value)->where('end_at', '<=', now())
            ->update([
                'status' => PollStatus::FINISHED->value
            ]);
    }
}
