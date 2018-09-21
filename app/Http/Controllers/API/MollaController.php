<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Molla;
use App\Http\Requests;

class MollaController extends Controller
{
    public function index($id = null)
    {
        try {
            // if id is given, find molla by id, else get all list
            $molla = $id ? Molla::findOrFail($id) : Molla::all();

            return response()->json($molla);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], $e->getCode() ?: 500);
        }


    }
}
