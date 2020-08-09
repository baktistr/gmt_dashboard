<?php

namespace App\Http\Controllers;

use App\Asset;
use App\BuildingSpace;
use Carbon\Carbon;
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
        $availableSpace = $this->availableSpaceChart($building->id);

        return view('building.show', [
            'building'       => $building,
            'availableSpace' => $availableSpace
        ]);
    }

    /**
     * Space Available Space Bar Chart
     * 
     * @return Illuminate\Support\Collection
     */
    protected function availableSpaceChart($id)
    {
        $last10Months = collect([]);

        for ($i = 0; $i < 10; $i++) {
            $last10Months->add(Carbon::now()->subMonths($i));
        }

        $last10Months->transform(function ($month) use ($id) {
            $availableSpace = BuildingSpace::query()
                ->where('asset_id', $id)
                ->where('is_available' , true)
                ->whereMonth('created_at', $month)
                ->count();

            return [
                'month' => $month->format('F Y'),
                'data' => $availableSpace,
            ];
        });

        return $last10Months;
    }
}
