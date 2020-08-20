<?php

namespace App\Http\Controllers;

use App\Area;
use App\TelkomRegional;
use Illuminate\Http\Request;

class TregController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\TelkomRegional $treg
     * @return \Illuminate\View\View
     */
    public function show(TelkomRegional $treg)
    {
        $area = Area::query()->where('telkom_regional_id', $treg->id)
            ->get()
            ->map(function ($area) use ($treg){
                return [
                    $area->id,
                    $area->name,
                    $area->allotment,
                    $area->address_detail,
                    route('treg.area.show', ['treg' => $treg->id, 'area' => $area->id]),
                ];
            });

        return view('treg.show', [
            'area' => $area,
            'treg' => $treg,
        ]);
    }
}
