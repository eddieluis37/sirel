<?php

namespace App\Modules\Ticket\Http\Controllers;
use App\Http\Controllers\Controller;


use App\Http\Requests;
use App\Modules\Ticket\Models\Ticket;
use App\Modules\Ticket\Repositories\ImportanceRepository;
use App\Modules\Ticket\Repositories\TypeRepository;
use App\Modules\Ticket\Http\Requests\ImportanceRequest;
use Illuminate\Http\Request;


class ApiTicketController extends Controller
{




    public function index()
    {
        return Ticket::all();
    }


    public function store2(CreateTicketRequest $request)
    {
        /**
         * maintain controller "thin"
         * let the validation handled somewhere else
         */

        $input = $request->all();
        $ticket = new Ticket;
        $ticket->name = $input['name'];
        $ticket->text = $input['text'];
        $ticket->description = $input['description'];
        $ticket->type_id = $input['type_id'];
        $ticket->importance_id = $input['importance_id'];

        $ticket->save();

        return redirect('ticket.method_name')->with('success', 'Student Created!');
    }


    public function store(Request $request)
    {
        return Ticket::create($request->all());
    }

    public function show($id)
    {
        return Ticket::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        Ticket::findOrFail($id)->update($request->all());
        return Response::json($request->all()); //response()->json()
    }

    public function destroy($id)
    {
        return Ticket::destroy($id);
    }
}
