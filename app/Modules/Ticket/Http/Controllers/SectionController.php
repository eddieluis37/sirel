<?php
namespace App\Modules\Ticket\Http\Controllers;

use App\Http\Requests;
use App\Modules\Ticket\Models\Section;

use App\Modules\Ticket\Repositories\SectionRepository;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;

class SectionController extends Controller
{
    /**
     * use custom repository instead of directly query in this controller
     * for reusability, e.g sending response for Ajax requests
     */

    protected $sections;

    public function __construct(SectionRepository $sections)//we allow type hinting here
    {
        $this->sections = $sections;
    }

    public function index(Request $request)
    {
        $allSections = $this->sections->getAllCreatedSections();

        return view('ticket::all_sections', array(
            'allSections' => $allSections
        ));
    }

    public function addNewSection(SectionRequest $request)
    {

        $username              = \Auth::user()->name;
        $input                 = $request->all();
        $section               = new Section;
        $section->section      = $input['section'];
        $section->created_by   = $username;

        $section->save();

        return redirect('ticket::ticket-sections')->with('success', $section->section . ' is Added');
    }
}
