<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\GraveyardRequest as StoreRequest;
use App\Http\Requests\GraveyardRequest as UpdateRequest;

/**
 * Class GraveyardCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class GraveyardCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Graveyard');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/graveyard');
        $this->crud->setEntityNameStrings('graveyard', 'graveyards');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'about',
            'type' => "ckeditor"
        ]);

        // add asterisk for fields that are required in GraveyardRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'location' => 'required',
            'about' => 'required|min:20',
            'categories' => 'nullable'
        ]);

        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'location' => 'required',
            'about' => 'required|min:20',
            'categories' => 'nullable'
        ]);

        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
