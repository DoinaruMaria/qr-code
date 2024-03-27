<?php

namespace App\Console\Commands;
use App\Models\Event;
use Carbon\Carbon;

use Illuminate\Console\Command;

class DuplicateEventsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:duplicate-events-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::all();
        foreach ($events as $event) {
            if ($event->end_date < now()->toDateString()) {
                $newEvent = $event->replicate();
                $newEvent->id = $event->id + 15; // Be careful with direct ID manipulation
                $newEvent->edition = $event->edition + 1;
                $newEvent->start_date = Carbon::parse($event->start_date)->addYear();
                $newEvent->end_date = Carbon::parse($event->end_date)->addYear();

                // $newEvent->slug = $event->slug . "-" . date("Y", strtotime($event->start_date));
                $newEvent->save();
            }
        }
    }
}