<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Hash;

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
            ['name' => 'full_name',
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

        $this->crud->addFields([

            ['name' => 'full_name',
            'label' => "Full Name",
            'type' => 'text'],

            ['name' => 'email',
            'label' => "Email",
            'type' => 'email'],

            ['name' => 'password',
            'label' => "Password",
            'type' => 'password'],

            ['name' => 'phone',
            'label' => "Phone number",
            'type' => 'text'],

            ['name' => 'extra_phone',
            'label' => "Extra Phone",
            'type' => 'text'],

            ['name' => 'avatar',
            'label' => "Image",
            'type' => 'browse'],

            ['name' => 'about',
            'label' => "About the Molla",
            'type' => 'ckeditor'],

            ['name' => 'gender',
            'label' => "Gender",
            'type' => 'enum'],

            ['name' => 'birth_date',
            'type' => 'date_picker',
            'label' => 'Birth Date',
            // optional:
            'date_picker_options' => [
            'todayBtn' => true,
            'format' => 'dd-mm-yyyy',
            'language' => 'en']],

            ['label' => "Belief",
            'type' => 'select',
            'name' => 'belief_id', // the db column for the foreign key
            'entity' => 'molla', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Belief"],

            ['name' => 'verified',
            'label' => 'Verified',
            'type' => 'select_from_array',
            'options' => [0 => "No", 1 => "Yes"]],

            ['name' => 'experience',
            'label' => 'Experience',
            'type' => 'number']

        ]);

        // add asterisk for fields that are required in MollaRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {

        if (!empty($request->password)) {
            $request->offsetSet('password', Hash::make($request->password));
        }

        $this->validate($request, [
            'full_name' => 'required|min:3',
            'email' => 'required|unique:mollas,email',
            'password' => 'required|min:6',
            'phone' => 'required|digits:12|unique:mollas,phone',
            'extra_phone' => 'nullable|digits:11',
            'avatar' => 'nullable',
            'about' => 'required|min:50',
            'gender' => 'required',
            'birth_day' => 'nullable',
            'belief_id' => 'required',
            'verified' => 'nullable',
            'experience' => 'required|digits_between:1,2'
        ]);

        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {

        if($request->filled('password') )
        {
            $request->offsetSet('password', Hash::make($request->password));
        }

        $this->validate($request, [
            'full_name' => 'required|min:3',
            'email' => 'required',
            'password' => 'nullable|min:6',
            'phone' => 'required|digits:12',
            'extra_phone' => 'nullable|digits:11',
            'avatar' => 'nullable',
            'about' => 'required|min:50',
            'gender' => 'required',
            'birth_day' => 'nullable',
            'belief_id' => 'required',
            'verified' => 'nullable',
            'experience' => 'required|digits_between:1,2'
        ]);

        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
