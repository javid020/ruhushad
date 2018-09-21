<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests;

class ServicesController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $service = $id ? Service::findOrFail($id) : Service::all();

        return response()->json($service);
    }
}
