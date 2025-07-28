<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agent.agent_login');
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
    }

    public function postadminlogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email == 'agent@gmail.com' && $password == '123') {
            return redirect()->intended('/AgentTicket')
                ->with('alert', [
                    'type' => 'success',
                    'message' => 'Agent Successfully Signed in !'
                ]);
        }

        return redirect()->intended('/AgentLogin')
            ->with('alert', [
                'type' => 'danger',
                'message' => 'Agent Signin Failed!!'
            ]);
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
}
