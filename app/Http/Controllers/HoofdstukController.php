<?php

namespace App\Http\Controllers;

use App\Models\Hoofdstuk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HoofdstukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Hoofdstuk::All();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naam' => 'required|alpha_num',
            'bestand' => 'required|regex:/^[a-zA-Z0-9-_]+$/',
        ]);

        if ($validator->fails()) {
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type', 'application/json');
        } else {
            return Hoofdstuk::create($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hoofdstuk $hoofdstuk)
    {
        return $hoofdstuk;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hoofdstuk $hoofdstuk)
    {
        $validator = Validator::make($request->all(), [
            'naam' => 'alpha_num',
            'bestand' => 'regex:/^[a-zA-Z0-9-_]+$/',
        ]);

        if ($validator->fails()) {
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type', 'application/json');
        } else {
            $hoofdstuk->update($request->all());
            return $hoofdstuk;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hoofdstuk $hoofdstuk)
    {
        $hoofdstuk->delete();
    }
}
