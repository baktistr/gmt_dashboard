<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = $this->getTotalUsers();

        return view('home', [
            'totalUsersLabel' => $totalUsers->reverse()->pluck('label'),
            'totalUsersData'  => $totalUsers->reverse()->pluck('data'),
            'totalUsers'      => $totalUsers->sum('data'),
        ]);
    }

    /**
     * Get total users.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getTotalUsers()
    {
        $last10Months = collect([]);

        for ($i = 0; $i < 10; $i++) {
            $last10Months->add(Carbon::now()->subMonths($i));
        }

        $last10Months->transform(function ($month) {
            $totalUsers = User::query()
                ->doesntHave('roles')
                ->whereMonth('created_at', $month)
                ->count();

            return [
                'label' => $month->format('F Y'),
                'data'  => $totalUsers,
            ];
        });

        return $last10Months;
    }
}
