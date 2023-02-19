<?php

namespace App\Console\Commands;

use App\Enums\PollStatus;
use App\Models\Poll;
use Illuminate\Console\Command;

class StartPendingPoll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'poll:start';

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
        Poll::query()->where('start_at', '<=', now())
            ->where('end_at', '>=', now())
            ->where('status', PollStatus::PENDING->value)->update([
                'status' => PollStatus::STARTED->value
            ]);
    }
}
