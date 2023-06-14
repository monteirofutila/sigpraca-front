<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Services\SaleService;
use App\Services\StatistService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function __construct(protected StatistService $service, protected SaleService $saleService, protected TransactionService $transactionService)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        Carbon::setLocale('pt_BR');
        $data = Carbon::now();
        $stast = $this->service->stast();
        $calendar = $data->toFormattedDateString();
        $sale = $this->saleService->getSaleByPeriod(
            startDate: $data->startOfDay(),
            lastDate: $data->endOfDay()
        );
        $transactions = $this->transactionService->getTransactionsByPeriod(
            startDate: $data->startOfDay(),
            lastDate: $data->endOfDay()
        );
        return view('home.dashboard', compact('stast', 'sale', 'calendar', 'transactions'));
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