<?php

namespace App\Http\Controllers;

use App\Models\GraveYard;
use Illuminate\Http\Request;

class GraveYardController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $id ? $graveYard = GraveYard::find($id) : $graveYard = GraveYard::all();

        return $graveYard;
    }
}
