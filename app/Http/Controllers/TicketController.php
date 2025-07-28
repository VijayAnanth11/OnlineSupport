<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

use App\Mail\CustomerMail;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastRecord = Ticket::latest()->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $gId = $lastId + 1;
        $refNo = 'OSS/00' . $gId;

        $tickets = [];
        $searchTxt = '';

        return view('customer.customer_home', compact('refNo', 'tickets', 'searchTxt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Ticket::create($input);

        $ref = $request->refno;
        $email = $request->email;

        $details = [
            'refNo' => $ref
        ];
        
        Mail::to($email)->send(new CustomerMail($details));
        
        return redirect('/')->with('flash_message', 'Ticket Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function view(string $id)
    {
        $ticket = Ticket::where('id', '=', $id)->get();
        return view('customer.view_ticket', compact('ticket'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function searchRef(Request $request)
    {
        $searchTxt = $request->searchTxt;

        $lastRecord = Ticket::latest()->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $gId = $lastId + 1;
        $refNo = 'OSS/00' . $gId;

        if ($searchTxt) {
            $tickets =  Ticket::where('refno', 'like', '%' . $searchTxt . '%')->paginate(10);
        } else {
            $tickets = [];
        }

        return view('customer.customer_home', compact('refNo', 'tickets', 'searchTxt'));
    }
    
}
