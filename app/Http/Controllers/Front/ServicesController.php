<?php

namespace App\Http\Controllers\Front;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\Service as ServiceResource;

class ServicesController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $service = $id ? Service::findOrFail($id) : Service::all();

        return response()->json($service);
    }
}
