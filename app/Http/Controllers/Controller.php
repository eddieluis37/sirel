<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use App\Repositories\AuditRepository as Audit;
use Illuminate\Contracts\Foundation\Application;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * @var Audit
     */
    protected $audit;

    /**
     * @var App
     */
    protected $app;

    protected $context;

    protected $context_help_area;

    public function __construct(Application $app, Audit $audit, $context = null)
    {
        $this->app = $app;
        $this->audit = $audit;
        $this->context = $context;
        $this->context_help_area = '';

        if ( Config('app.context_help_area') ) {
            try {
                $routeName = $this->app->request->route()->getName();
                $helpViewName = (($this->context) ? $this->context . "::" : '') . "context_help." . $routeName;
                $this->context_help_area = View::make($helpViewName)->render();
            }
            catch (\Exception $ex)
            {
                $this->context_help_area = View::make('context_help.disabled', ['exMessage' => $ex->getMessage()])->render();
            }
        }
        View::share('context_help_area', $this->context_help_area);
    }


}
