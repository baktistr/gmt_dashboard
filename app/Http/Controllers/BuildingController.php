<?php

namespace App\Http\Controllers;

use App\Asset;
use App\BuildingHelpDesk;
use App\BuildingSpace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        $availableSpace   = $this->availableSpaceChart($building->id)->toArray();
        $unAvailableChart = $this->availableSpaceChart($building->id, false)->toArray();
        $pending          = $this->countComplaint('pending', $building->id);
        $done             = $this->countComplaint('done', $building->id);
        $progress         = $this->countComplaint('in-progress', $building->id);
        $total            = $this->totalComplaint($building->id);
        $complaintByMount = $this->complaintCountBymonth($building->id);

        return view('building.show', [
            'building'         => $building,
            'availableSpace'   => $availableSpace,
            'unAvailableChart' => $unAvailableChart,
            'pending'          => $pending,
            'done'             => $done,
            'progress'         => $progress,
            'total'            => $total,
            'complaints'       => $complaintByMount,
        ]);
    }

    /**
     * Space Available Space Bar Chart
     * 
     * @return Collection
     */
    protected function availableSpaceChart($id, $available = true)
    {
        $last10Months = collect([]);

        for ($i = 0; $i < 10; $i++) {
            $last10Months->add(Carbon::now()->subMonths($i));
        }

        $last10Months->transform(function ($month) use ($id, $available) {
            $availableSpace = BuildingSpace::query()
                ->where('building_id', $id)
                ->where('is_available', $available)
                ->whereMonth('created_at', $month)
                ->count();

            return [
                'data'  => $availableSpace,
                'lables' => $month->format('F Y'),
            ];
        });

        return $last10Months;
    }

    /**
     * Display Complaint Chart
     * @return int
     */
    protected function countComplaint(string $status, int $building_id = null)
    {

        $complaints = Asset::query()
            ->with('complaints')
            ->where('id', $building_id)
            ->whereHas('complaints', function ($query) use ($status) {
                $query->where('status', $status);
            })->count();

        return $complaints;
    }

    /**
     * Count total Compalaint
     * @return int
     */
    protected function totalComplaint(int $building_id)
    {
        /* Total Complaints */

        $complaints = Asset::query()
            ->find($building_id)
            ->complaints
            ->count();

        return $complaints;
    }

    protected function complaintCountBymonth(int $building_id)
    {

        $last12Months = collect([]);

        for ($i = 0; $i < 12; $i++) {
            $last12Months->add(Carbon::now()->months($i + 1));
        }

        $last12Months->transform(function ($month) use ($building_id) {

            $complaint = BuildingHelpDesk::query()
                ->where('building_id', $building_id)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at' , $month)
                ->count();

            return [
                'data'   => $complaint,
                'labels' => $month->format('F Y'),
            ];
        });

        return $last12Months;

    }
}
