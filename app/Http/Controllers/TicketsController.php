<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    /**
     * store a newly created resource
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();

        $data = $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $ticket->saveTicket($data);

        return redirect('/home')
        ->with('success', 'New support ticket has been created. Wait sometime to get resolved.');
    }
}
