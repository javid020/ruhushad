<?php

namespace App\Http\Controllers;

use App\Models\Molla;
use Illuminate\Http\Request;

class MollaController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $id ? $molla = Molla::find($id) : $molla = Molla::all();

        return $molla;
    }

}
