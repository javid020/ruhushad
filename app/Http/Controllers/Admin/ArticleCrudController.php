<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ArticleCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Article');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/article');
        $this->crud->setEntityNameStrings('article', 'articles');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumns([
            ['name' => 'title',
            'label' => 'Title',
            'type' => 'text'],
            ['name' => 'body',
            'label' => 'Body',
            'type' => 'text'],
            ['name' => 'published_at',
            'label' => 'Published Date',
            'type' => 'date',
            'format' => 'j F Y'],
        ]);

        $this->crud->addFields([

            ['name' => 'title',
            'label' => "Title",
            'type' => 'text'],

            ['name' => 'body',
            'label' => "Body",
            'type' => 'ckeditor'],

            ['name' => 'published_at',
            'label' => "Published Date",
            'type' => 'datetime_picker',
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY HH:mm',
                'language' => 'en'
            ]],

            ['label' => "Category",
            'type' => 'select2_multiple',
            'name' => 'categories', // the method that defines the relationship in your Model
            'entity' => 'categories', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Category", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ],

        ]);

        // add asterisk for fields that are required in ArticleRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required|min:20',
            'published_at' => 'required',
            'categories' => 'required'
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
            'title' => 'required|min:3',
            'body' => 'required|min:20',
            'published_at' => 'required',
            'categories' => 'required'
        ]);

        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
