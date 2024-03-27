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
        $currentYear = date("Y");
        $nextYear = date("Y", strtotime("+1 year"));
        $events = Event::all();
        foreach ($events as $event) {
            if ($event->end_date < now()->toDateString()) {
                $newId = $event->id + 15;


            if (!Event::where('id', $newId)->exists()) {
                $newEvent = $event->replicate();
                $newEvent->id = $newId; // Assign the new id
                $newEvent->edition = $event->edition + 1;
                $newEvent->start_date = Carbon::parse($event->start_date)->addYear();
                $newEvent->end_date = Carbon::parse($event->end_date)->addYear();
                $year = Carbon::parse($newEvent->start_date)->year;
                $newEvent->slug = trim(strtolower($event->name)) . '-' . $year;

                $newEvent->save();
            }
        }
            }
        }
    }
