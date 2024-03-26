<?php

namespace App\Http\Controllers;

use App\Models\Script;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Script::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hoofdstuk_id' => 'required',
            'volgorde' => 'required',
            'naam' => 'required',
            'bestand' => 'required',
            'PHP_versie' => 'required',
        ]);

        if ($validator->fails()) {
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type', 'application/json');
        } else {
            return Script::create($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Script $script)
    {
        return $script;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Script $script)
    {
        $validator = Validator::make($request->all(), [
            'hoofdstuk_id' => 'required',
            'volgorde' => 'required',
            'naam' => 'required',
            'bestand' => 'required',
            'PHP_versie' => 'required',
        ]);

        if ($validator->fails()) {
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type', 'application/json');
        } else {
            $script->update($request->all());
            return $script;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Script $script)
    {
        $script->delete();
    }
}
