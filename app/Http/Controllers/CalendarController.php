<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Event; // Asigură-te că adaugi modelul de evenimente, înlocuiește cu calea corectă

class CalendarController extends Controller
{
    public function downloadICS($eventId) {
        // Obține detaliile evenimentului din baza de date folosind $eventId
        $event = Event::find($eventId);

        // Generează conținutul fișierului .ics
        $icsContent = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//Your Company//NONSGML Event Calendar//EN
BEGIN:VEVENT
UID:" . uniqid() . "
DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z
DTSTART:" . gmdate('Ymd', strtotime($event->start_date)) .'T'. gmdate('His', strtotime($event->start_date)) . "Z
DTEND:" . gmdate('Ymd', strtotime($event->end_date)) .'T'. gmdate('His', strtotime($event->end_date)) . "Z
SUMMARY:" . $event->name . "
DESCRIPTION:" . $event->excerpt . "
LOCATION:" . $event->venue . "
END:VEVENT
END:VCALENDAR";

        // Setarea antetului pentru descărcarea fișierului .ics
        return response($icsContent)
            ->header('Content-Type', 'text/calendar; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="event.ics"');
    }
}
