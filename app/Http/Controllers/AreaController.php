<?php

namespace App\Http\Controllers;

use App\Area;
use App\TelkomRegional;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TelkomRegional $treg, Area $area)
    {

        $area->load('assets');

        $buildings = $area->assets->transform(function ($building) {
            return [
                $building->id,
                $building->name,
                $building->area->code,
                $building->formatted_building_code,
                $building->area->witel->name,
                route('building.show' , $building->id)
            ];
        });

        return view('area.show', [
            'area' => $area,
            'buildings' => $buildings
        ]);
    }
}
