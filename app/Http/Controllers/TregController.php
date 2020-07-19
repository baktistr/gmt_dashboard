<?php

namespace App\Http\Controllers;

use App\Area;
use App\Asset;
use App\TelkomRegional;
use Illuminate\Http\Request;

class TregController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TelkomRegional $treg
     * @return \Illuminate\View\View
     */
    public function show(TelkomRegional $treg)
    {
        $area = Area::query()->where('telkom_regional_id', $treg->id)
            ->pluck('id');

        $assets = Asset::with(['area'])
            ->whereIn('area_id', $area)
            ->get()
            ->map(function ($asset) {
                return [
                    $asset->id,
                    $asset->name,
                    $asset->area->code,
                    $asset->formatted_building_code,
                    $asset->area->witel->name,
                    route('building.show', $asset->id)
                ];
            });

        return view('treg.show', [
            'treg'   => $treg,
            'assets' => $assets,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
