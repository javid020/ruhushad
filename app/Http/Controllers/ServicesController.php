<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $id ? $service = Service::find($id) : $service = Service::all();

        return $service;
    }
}
