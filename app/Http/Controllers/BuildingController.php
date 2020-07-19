<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Asset $building
     * @return \Illuminate\View\View
     */
    public function show(Asset $building)
    {
        return view('building.show', [
            'building' => $building,
        ]);
    }
}
