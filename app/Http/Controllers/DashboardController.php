<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Services\StatistService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(protected StatistService $service)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $stast = $this->service->stast();
        return view('home.dashboard', compact('stast'));
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