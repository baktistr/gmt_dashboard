<?php

namespace App\Http\Controllers;

use App\Area;
use App\Building;
use App\BuildingSpace;
use App\TelkomRegional;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

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
        $tregs = Cache::remember('home:tregs', now()->addDay(), function () {
            return TelkomRegional::query()->withCount(['areas', 'assets'])
                ->get()
                ->map(function ($treg) {
                    return [
                        'id'          => str_replace(' ', '', $treg->name),
                        'treg'        => $treg->name,
                        'areasCount'  => $treg->areas_count,
                        'assetsCount' => $treg->assets_count,
                    ];
                });
        });

        return view('home', [
            'tregs' => $tregs,
        ]);
    }
}
