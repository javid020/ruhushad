<?php

namespace App\Http\Controller\Front;

use App\Http\Controllers\Controller;
use App\Models\GraveYard;

class GraveYardController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $id ? $graveYard = GraveYard::find($id) : $graveYard = GraveYard::all();

        return $graveYard;
    }
}
