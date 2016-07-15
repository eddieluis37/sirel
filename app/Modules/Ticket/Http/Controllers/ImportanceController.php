<?php

namespace App\Modules\Ticket\Http\Controllers;
use App\Http\Controllers\Controller;


use App\Http\Requests;
use App\Modules\Ticket\Models\Importance;
use App\Modules\Ticket\Repositories\ImportanceRepository;
use App\Modules\Ticket\Http\Requests\ImportanceRequest;
use Illuminate\Http\Request;


/**
 * @author   <amaybisayaatyahoodotcom>
 */
class ImportanceController extends Controller
{
    /**
     * use custom repository instead of directly query in this controller
     * for reusability, e.g sending response for Ajax requests 
     */
    
    protected $importances;

    public function __construct(ImportanceRepository $importances)//we allow type hinting here
    {
    	$this->importances = $importances;
    }

    public function index(Request $request)
    {
    	$allImportances = $this->importances->getAllCreatedImportances();

    	return view('importances.all_importances', array(
    		'allImportances' => $allImportances
    	));
    }

    public function addNewImportance(ImportanceRequest $request)
    {
        
        $username              = \Auth::user()->name;
        $input                 = $request->all();
        $section               = new Importance;
        $section->section      = $input['section'];
        $section->created_by   = $username;

        $section->save();

        return redirect()->route('importances.all_importances')->with('success', $section->section . ' is Added');
    }
}
