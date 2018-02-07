<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->get();

        return view('user.home')->with('tickets', $tickets);
    }

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

        return redirect('/tickets')
        ->with('success', 'New support ticket has been created. Wait sometime to get resolved.');
    }

    public function edit(int $id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();
        
        return view('user.edit', compact('ticket', 'id'));
    }

    public function update(Request $request, $id)
    {
        $ticket = new Ticket();
        $data = $this->validate($request, [
            'title' => 'required|min:4',
            'description' => 'required|min:8'
        ]);
        $data['id'] = $id;
        $ticket->updateTicket($data);
        return redirect('/tickets')
                ->with('success', 'New support ticket has been updated.');
    }

    public function delete($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect('/tickets')->with('success', 'Ticket has been deleted !!');
    }
}
