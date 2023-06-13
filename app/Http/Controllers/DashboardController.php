<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Services\SaleService;
use App\Services\StatistService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function __construct(protected StatistService $service, protected SaleService $saleService)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $stast = $this->service->stast();
        $sale = $this->saleService->getSaleByPeriod(
            startDate: Carbon::now()->startOfDay(),
            lastDate: Carbon::now()->endOfDay()
        );

        return view('home.dashboard', compact('stast', 'sale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}