<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MollaRequest as StoreRequest;
use App\Http\Requests\MollaRequest as UpdateRequest;

/**
 * Class MollaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MollaCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Molla');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/molla');
        $this->crud->setEntityNameStrings('molla', 'mollas');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumns([
            ['name' => 'id',
            'label' => 'ID',
            'type' => 'text'],
            ['name' => 'fullname',
            'label' => 'FullName',
            'type' => 'text'],
            ['name' => 'email',
            'label' => 'Email',
            'type' => 'text'],
            ['name' => 'phone',
            'label' => 'Phone',
            'type' => 'text'],
            ['name' => 'phone1',
            'label' => 'Phone 2',
            'type' => 'text'],
            ['name' => 'verified',
            'label' => 'Verified',
            'type' => 'boolean',
            'options' => [0 => 'Inctive', 1 => 'Active']],
        ]);

        // add asterisk for fields that are required in MollaRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
