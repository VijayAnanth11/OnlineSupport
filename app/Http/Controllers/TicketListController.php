<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

use App\Mail\AgentMail;
use Illuminate\Support\Facades\Mail;

class TicketListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $searchTxt = '';

        return view('agent.agent_home', compact('tickets', 'searchTxt'));
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
        //
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
        $ticket = Ticket::where('id', '=', $id)->get();
        return view('agent.update_ticket', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $find = Ticket::find($id);
        $input = $request->all();

        $find->update($input);

        $ref = $request->refno;
        $email = $request->email;
        $reply = $request->reply;

        $details = [
            'refNo' => $ref,
            'reply' => $reply
        ];

        Mail::to('vijayuuu1211@gmail.com')->send(new AgentMail($details));
        
        return redirect('AgentTicket')->with('flash_message', 'Ticket Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function searchCus(Request $request)
    {
        $searchTxt = $request->searchTxt;

        if ($searchTxt) {
            $tickets =  Ticket::where('customer', 'like', '%' . $searchTxt . '%')->paginate(10);
        } else {
            $tickets = Ticket::all();
        }

        return view('agent.agent_home', compact('tickets', 'searchTxt'));
    }

}
