<?php

namespace App\Http\Controllers\Frontend;

use DateTime;
use Exception;
use Dompdf\Dompdf;
// use PDF;

use Dompdf\Options;
use App\Models\Events;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EventParticipants;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;

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
        $data_cert = $userAuth
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
            )->where('event_id', $id)
            ->where('is_attended', 1)
            ->first();
        // dd($data_cert);
        $path = public_path('frontend/images/cert/cert.jpg'); // Correct local path
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // Set DomPDF options
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Allows loading external images

        // Create a new DomPDF instance with options
        $dompdf = new Dompdf($options);
        $pdfContent = view('front.page.events.cert', compact(['base64', 'data_cert']))->render();
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
    public function test_id()
    {
        return view('front.page.events.test_eventid');
    }
    public function joinEvent(Request $request)
    {
        $validatedData = $request->validate(['event_id' => 'required|uuid']);
        $eventId = $validatedData['event_id'];

        try {
            $userAuth = auth()->user();
            if (! $userAuth) {
                return redirect()->route('login');
            }
            $regist_range = Events::query()
                ->select('start_date', 'end_date')
                ->where('id', $eventId)
                ->first();
            $open_regist = new DateTime($regist_range->start_date);
            $close_regist = new DateTime($regist_range->end_date);
            $today = date_create('now');

            if ($open_regist <= $today && $close_regist > $today == false) {
                return response()->json([
                    'status' => false,
                    'message' => "Event registration haas been closed or not yet open"
                ]);
            }

            $checkUserExists = EventParticipants::where('event_id', $eventId)->where('user_id', $userAuth->id)->exists();
            if ($checkUserExists) {
                return response()->json([
                    'status' => 'success',
                    'message' => "You've been Success to register this Event"
                ], 201);
            }

            $transaction = new F_TransactionController();
            $createTransaction = $transaction->createTransaction('event', $eventId);

            $transaction_id = $createTransaction['transaction_id'];
            $transaction_id_crypt = Crypt::encrypt($transaction_id->__tostring());

            $insertParticipant = EventParticipants::create([
                'event_id' => $eventId,
                'user_id' => $userAuth->id,
                'transaction_id' => $createTransaction['transaction_id'],
                'is_attended' => 0
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "You've been Success to register this Event",
                'transaction_id' => $transaction_id_crypt
            ], 201);
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
