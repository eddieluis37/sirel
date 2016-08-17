<?php
namespace App\Modules\Ticket\Http\Controllers;

use App\Http\Requests;
use App\Modules\Ticket\Models\Ticket;

use App\Modules\Ticket\Repositories\TicketRepository;
use App\Modules\Ticket\Repositories\ImportanceRepository;
use App\Modules\Ticket\Repositories\TypeRepository;

use App\Modules\Ticket\Http\Requests\CreateTicketRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;


class TicketController extends Controller
{

    protected $tickets;
    protected $importances;
    protected $types;


    public function __construct(TicketRepository $tickets, ImportanceRepository $importances, TypeRepository $types)
    {
        //laravel's dependency injection?
        $this->tickets = $tickets;
        $this->importances = $importances;
        $this->types = $types;
    }


    public function methodName1(Request $request)
    {
        $tickets = Ticket::all();

        return view('ticket::method_name')->with('tickets', $tickets);


    }

    public function methodName(Request $request)
    {
        $allTickets = $this->tickets->getAllTickets();
        $allImportances = $this->importances->getAllImportances();
        $allTypes = $this->types->getAllTypes();


        return view('ticket::method_name', array(

            'allTickets' => $allTickets,
            'allImportances' => $allImportances,
            'allTypes' => $allTypes

        ));


    }




    public function index2()
    {
        return view('ticket.create');
    }








    public function index()
    {

        $types = \DB::table('types')->lists('name', 'id');
        return view('ticket::create')->with('types', $types);


        $importances = \DB::table('importances')->lists('name', 'id');
        return view('ticket::create')->with('importances', $importances);


    }


    //Este metodo es muy sencillo puesto que solo va a devolver una vista sin ninguna variable
    // ni uso de Eloquent, por lo cual queda de la siguiente manera:+

    public function create()
    {
        $importances = \DB::table('importances')->lists('name', 'id');
        $types = \DB::table('types')->lists('name', 'id');
        $sections = \DB::table('sections')->lists('section', 'id');
        return view('ticket::create', array(
            'importances' => $importances,
            'types' => $types,
            'sections' => $sections,


        ));


    }

    public function listarCreate()
    {


        $importances = \DB::table('importances')->lists('name', 'id');
        $types = \DB::table('types')->lists('name', 'id');

        return view('ticket::create', array(
            'importances' => $importances,
            'types' => $types,

        ));


    }


    //Guarda

    public function store(CreateTicketRequest $request)
    {

        return Ticket::create($request->all());
    }




    public function store2(CreateTicketRequest $request)
    {

        $request->user()->ticket()->create([

            'name'          => $request->name,
            'text'          => $request->text,
            'description'   => $request->description,
            'importance_id' => $request->importance_id,
            'type_id'       => $request->type_id,
            'section_id'    => $request->section_id

        ]);


        return redirect()->route('ticket.method_name');

    }


    public function AddNewTicket(CreateTicketRequest $request)
    {
        /**
         * maintain controller "thin"
         * let the validation handled somewhere else
         */

        $input  = $request->all();
        $ticket = new Ticket;
        $ticket->name = $input['name'];
        $ticket->text = $input['text'];
        $ticket->description = $input['description'];
        $ticket->type_id = $input['type_id'];
        $ticket->importance_id = $input['importance_id'];

        $ticket->save();

        return redirect('ticket.method_name')->with('success', 'Student Created!');
    }


}