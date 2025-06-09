<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Events;
use Dompdf\Dompdf;
use Dompdf\Options;
// use PDF;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\EventParticipants;
use DateTime;

class F_EventsController extends Controller
{

    public function index()
    {
        // Retrieve the list of events
        // The with() method is used to eager load the related eventtype
        $events = Events::with('eventtype')
            // Sort the events by event_date in ascending order
            ->orderBy('event_date')
            // Filter the events to only include the ones that are in the future
            ->where('event_date', '>=', date('Y-m-d'))
            ->get();

        // Retrieve the list of last events
        // The with() method is used to eager load the related eventtype
        $lastEvents = Events::with('eventtype')
            // Sort the events by event_date in descending order
            ->orderBy('event_date', 'desc')
            // Filter the events to only include the ones that are in the past
            ->where('event_date', '<', date('Y-m-d'))
            ->get();

        // Return the view with the events and last events
        return view('front.page.events.index', compact('events', 'lastEvents'));
    }
    /**
     * Detail page for an event
     *
     * @param string $slug The slug for the event
     * @return \Illuminate\Contracts\View\View
     */

    public function cert($id)
    {
        $userAuth = auth()->user();
        $data = $userAuth
            ->hasParticipated()
            ->select(
                'events.id AS event_id',
                'events.title',
                'events.slug',
                'event_date',
                'users.name AS fullname',
                'certificates.id AS certificate_id',
                'certificates.serial_number',
                'certificates.pic AS signatory',
                'issued_at',
                'valid_until'
            )->where('users.id', $id)
            ->first();
        $path = public_path('frontend/images/cert/cert.jpg'); // Correct local path
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // Set DomPDF options
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Allows loading external images

        // Create a new DomPDF instance with options
        $dompdf = new Dompdf($options);
        $pdfContent = view('front.page.events.cert', compact('base64'))->render();
        $dompdf->loadHtml($pdfContent);

        // Set paper size & render PDF
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        // return $dompdf->stream('certificate.pdf');
        return $dompdf->stream('certificate.pdf', ["Attachment" => false]);
    }
    public function detail($slug)
    {
        // Retrieve the event with the given slug
        $event = Events::with('eventtype')->where('slug', $slug)->first();

        // Retrieve the related events
        $relatedEvents = Events::with('eventtype')->where('id', '!=', $event->id)->limit(3)->get();

        // Return the view with the event and the related events
        return view('front.page.events.detail', compact('event', 'relatedEvents'));
    }
    public function join($eventId)
    {
        try {
            $userAuth = auth()->user();
            if (!$userAuth) {
                return redirect()->route('login');
            }
            $regist_range = Events::query()
                ->select('start_date', 'end_date')
                ->where('id', $eventId)
                ->first();
            $open_regist = new DateTime($regist_range['start_date']);
            $close_regist = new DateTime($regist_range['end_date']);
            if ($open_regist <= date_create('now') && $close_regist > date_create('now')) {
                return $userAuth->events()->attach($eventId, ['id' => Str::orderedUuid()]);
            };
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
        // $users = User::all(); // Example: Retrieve data from the database
        // return view('front.page.events.presents');
    }
}
