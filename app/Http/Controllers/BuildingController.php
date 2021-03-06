<?php

namespace App\Http\Controllers;

use App\Building;
use App\BuildingDailyElectricityConsumption;
use App\BuildingSpace;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class BuildingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Building $building
     * @return \Illuminate\View\View
     */
    public function show(Building $building)
    {
        $availableSpace         = $this->availableSpaceChart($building->id)->toArray();
        $unAvailableChart       = $this->availableSpaceChart($building->id, false)->toArray();
        $electricityConsumption = $this->getElectricityCounting($building);
        $waterConsumptions      = $this->getWaterConsumptionCounting($building);
        $fuel                   = $this->getFuelCounting($building);
        $insuranceStatus        = $this->getInsuranceStatus($building);
        
        $complaints = [
            'total'           => $building->complaints()->count(),
            'totalPending'    => $this->getComplaintsCountByStatus($building, 'pending'),
            'totalInProgress' => $this->getComplaintsCountByStatus($building, 'in-progress'),
            'totalDone'       => $this->getComplaintsCountByStatus($building, 'done'),
            'data'            => $this->getComplaints($building),
        ];

        return view('building.show', [
            'building'               => $building,
            'availableSpace'         => $availableSpace,
            'unAvailableChart'       => $unAvailableChart,
            'complaints'             => $complaints,
            'electricityConsumption' => $electricityConsumption,
            'waterConsumptions'      => $waterConsumptions,
            'fuel'                   => $fuel,
            'insurance'              => $insuranceStatus,
        ]);
    }

    /**
     * Space Available Space Bar Chart
     *
     * @param      $id
     * @param bool $available
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
                'data'   => $availableSpace,
                'lables' => $month->format('F Y'),
            ];
        });

        return $last10Months->reverse();
    }

    /**
     * Get complaints data for current year.
     *
     * @param \App\Building $building
     * @return \Illuminate\Support\Collection
     */
    protected function getComplaints(Building $building)
    {
        $complaints = collect([]);

        for ($i = 0; $i < 12; $i++) {
            $complaints->add(Carbon::now()->months($i + 1));
        }

        $complaints->transform(function ($month) use ($building) {
            $totalComplaints = $building->complaints()
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $month)
                ->count();

            return [
                'label'  => $month->format('F'),
                'status' => [
                    'pending'         => [
                        'total'      => $totalPending = $this->getComplaintsCountByStatus($building, 'pending', $month),
                        'percentage' => $totalPending ? ($totalPending / $totalComplaints) * 100 : 0,
                    ],
                    'in-progress'     => [
                        'total'      => $totalInProgress = $this->getComplaintsCountByStatus($building, 'in-progress', $month),
                        'percentage' => $totalInProgress ? ($totalInProgress / $totalComplaints) * 100 : 0,
                    ],
                    'done'            => [
                        'total'      => $totalDone = $this->getComplaintsCountByStatus($building, 'done', $month),
                        'percentage' => $totalDone ? ($totalDone / $totalComplaints) * 100 : 0,
                    ],
                    'totalComplaints' => $totalComplaints,
                ],
            ];
        });

        return $complaints;
    }

    /**
     * Get Complaints count by status.
     *
     * @param \App\Building $building
     * @param               $status
     * @param null          $month
     * @return int
     */
    protected function getComplaintsCountByStatus(Building $building, $status, $month = null)
    {
        return $building->complaints()
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('created_at', $month)
                    ->whereYear('created_at', $month);
            })
            ->where('status', $status)
            ->count();
    }

    /**
     * Get Counting used Electricity on this month
     * @param \App\Building
     * @return mixed
     */
    protected function getElectricityCounting(Building $building)
    {

        $total = collect([]);

        $consumptions = $building
            ->electricityConsumptions()
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->get();

        $consumptions->each(function ($consumption) use ($total) {
            $total->add($consumption->totalElectricMeter());
        });

        return $total->sum();
    }

    /**
     * Get Counting used Water Consumption  on this month
     * @param \App\Building
     * @return mixed
     */
    protected function getWaterConsumptionCounting(Building $building)
    {
        $total = collect([]);

        $waterConsumptions = $building
            ->waterConsumptions()
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->get();
        $waterConsumptions->each(function ($consumption) use ($total) {
            $total->add($consumption->usage);
        });

        return $total->sum();
    }

    /**
     * Get Counting for Fuel
     * @param App\Building
     * @return mixed
     */
    protected function getFuelCounting(Building $building)
    {
        $total = collect([]);

        $fuel = $building->dieselFuelConsumptions()
            ->whereMonth('date', now()->month)
            ->whereyear('date', now()->year)
            ->where('type', 'remain')
            ->get();
        $fuel->each(function ($fuel) use ($total) {
            $total->add($fuel->amount);
        });

        return $total->sum();
    }

    /**
     * Get Insurance
     * @param \App\Building $building
     * @return string
     */
    public function getInsuranceStatus(Building $building)
    {
        $insurance = $building->insurances()->latest('date_expired')->first();

        if (!$insurance) {
            return "Insurance is not available";
        }

        switch ($insurance) {
            case $insurance->date_expired->gt(now()->addMonths(2)):
                return 'active';
                break;
            case $insurance->date_expired->gt(now()) && $insurance->date_expired->lt(now()->addMonths(2)):
                return 'expired soon';
                break;
            default:
                return 'expired';
        }
    }
}
