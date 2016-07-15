<?php namespace App\Modules\Ticket\Utils;

use Sroutier\L51ESKModules\Contracts\ModuleMaintenanceInterface;
use App\Models\Menu;
use App\Models\Route;
use App\Models\Permission;
use App\Models\Role;
use DB;

class TicketMaintenance implements ModuleMaintenanceInterface {


    static public function initialize()
    {

        DB::transaction(function () {

            //Register module routes.
            $routeMethodName = Route::firstOrCreate([
                'name' => 'ticket.method-name',
                'method' => 'GET',
                'path' => 'ticket/methodName',
                'action_name' => 'App\Modules\Ticket\Http\Controllers\TicketController@methodName',
                'enabled' => 1,
            ]);

            // Create permissions required by module
            $permUseTicketMethodName = Permission::firstOrCreate([
                'name' => 'use-ticket-method-name',
                'display_name' => 'Use Ticket Method Name',
                'description' => 'Allows a user to use the Method Name function from the Ticket module.',
                'enabled' => true,
            ]);

            // Associate module permissions to the module routes
            $routeMethodName->permission()->associate($permUseTicketMethodName);
            $routeMethodName->save();

            // Create a role for the module
            $roleTicketMethodName = Role::firstOrCreate([
                "name" => "ticket-method-name-users",
                "display_name" => "Ticket Method Name Users",
                "description" => "Users of the Method Name function from the Ticket module.",
                "enabled" => true
            ]);
            // Assign module permission to new role.
            $roleTicketMethodName->perms()->sync([$permUseTicketMethodName->id]);

            // Get handle on home menu as the parent.
            $parentMenu = Menu::where('name', 'home')->first();
            // If home menu was not found, the site admin, must have customized the menu system.
            // Best to create our menu under root and let the admin work it out.
            if (!$parentMenu) {
                $parentMenu = Menu::where('name', 'root')->first();
            }

            // Create modules menu container/folder.
            $menuTicketContainer = Menu::firstOrCreate([
                'name'          => 'ticket-container',
                'label'         => 'Ticket',
                'position'      => 10,
                'icon'          => 'fa fa-folder',
                'separator'     => false,
                'url'           => null,                // No url.
                'enabled'       => true,
                'parent_id'     => $parentMenu->id,     // Parent is home or root.
                'route_id'      => null,                // No route
                'permission_id' => null,                // Get permission from sub-items. If the user has permission to see/use
                                                        // any sub-items, the menu will be rendered, otherwise it will
                                                        // not.
            ]);
            // Create methodName sub-menu one
            $menuTicketMethodName = Menu::firstOrCreate([
                'name'          => 'ticket-method-name',
                'label'         => 'Method Name',
                'position'      => 0,
                'icon'          => 'fa fa-file',
                'separator'     => false,
                'url'           => null,                   // Get URL from route.
                'enabled'       => false,
                'parent_id'     => $menuTicketContainer->id,
                'route_id'      => $routeMethodName->id,
                'permission_id' => null,                   // Get permission from route.
            ]);

        }); // End of DB::transaction(....)

    }

    static public function unInitialize()
    {

        DB::transaction(function () {

            // Locate module sub menu entries and delete them.
            $menuTicketMethodName = Menu::where('name', 'ticket-method-name')->first();
            Menu::destroy($menuTicketMethodName->id);
            // Locate demo module parent folder and delete it if if does not contain
            // any other sub-menu entries.
            $menuTicketContainer = Menu::where('name', 'ticket-container')->first();
            if ( ($menuTicketContainer) && (!$menuTicketContainer->children->count()) ) {
                Menu::destroy($menuTicketContainer->id);
            }

            // Locate module role, detach from perms and users then delete.
            $roleTicketMethodName = Role::where('name', 'ticket-method-name-users')->first();
            if ($roleTicketMethodName) {
                $roleTicketMethodName->perms()->detach();
                $roleTicketMethodName->users()->detach();
                Role::destroy($roleTicketMethodName->id);
            }

            // Locate module routes, dissociate from perms and delete
            $routeMethodName = Route::where('name', 'ticket.method-name')->first();
            if ($routeMethodName) {
                $routeMethodName->permission()->dissociate();
                Route::destroy($routeMethodName->id);
            }

            // Locate module permission and delete
            $permUseTicketMethodName = Permission::where('name', 'use-ticket-method-name')->first();
            if ($permUseTicketMethodName) {
                Permission::destroy($permUseTicketMethodName->id);
            }

        }); // End of DB::transaction(....)

    }

    static public function enable()
    {

        DB::transaction(function () {

            // Locate module sub menu entries and enable them.
            $menuTicketMethodName = Menu::where('name', 'ticket-method-name')->first();
            if ($menuTicketMethodName) {
                $menuTicketMethodName->enabled = true;
                $menuTicketMethodName->save();
            }

        }); // End of DB::transaction(....)

    }

    static public function disable()
    {

        DB::transaction(function () {

            // Locate module sub menu entries and disable them.
            $menuTicketMethodName = Menu::where('name', 'ticket-method-name')->first();
            if ($menuTicketMethodName) {
                $menuTicketMethodName->enabled = false;
                $menuTicketMethodName->save();
            }

        }); // End of DB::transaction(....)

    }

}