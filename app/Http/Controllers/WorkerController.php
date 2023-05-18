<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Services\WorkerService;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function __construct(protected WorkerService $service)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = $this->service->getAll();
        return view('workers.list_workers', compact('workers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('workers.add_workers');
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