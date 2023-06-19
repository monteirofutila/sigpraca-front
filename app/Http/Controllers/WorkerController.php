<?php

namespace App\Http\Controllers;

use App\DTO\Workers\CreateWorkerDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\StoreWorkerRequest;
use App\Services\CategoryService;
use App\Services\WorkerService;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function __construct(protected WorkerService $service, protected CategoryService $categoryService)
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
        $categories = $this->categoryService->getAll();
        return view('workers.add_workers', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        //
        $dto = CreateWorkerDTO::makeFromRequest($request);
        $worker = $this->service->new($dto);

        if ($worker === null) {
            toast('Falha ao cadastrar novo feirante!', 'error');
            return redirect()->back();
        }

        if (isset($worker->errors)) {
            toast('Não foi possivel adicionar o feirante!', 'error');
            return redirect()->back()->withErrors($worker->errors);
        }

        toast('Item criado com sucesso!', 'success');
        return redirect()->route('workers.create');

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
