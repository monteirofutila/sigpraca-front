<?php

namespace App\Http\Controllers;

use App\DTO\Workers\WorkerDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\WorkerRequest;
use App\Services\CategoryService;
use App\Services\WorkerService;
use RealRashid\SweetAlert\Facades\Alert;

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
        confirmDelete();
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
    public function store(WorkerRequest $request)
    {
        //
        $dto = WorkerDTO::makeFromRequest($request);
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
    public function edit(string $id)
    {
        //
        $data = $this->service->findById($id)->data;
        $categories = $this->categoryService->getAll();
        return view('workers.edit_workers', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkerRequest $request, string $id)
    {
        //
        $dto = WorkerDTO::makeFromRequest($request);
        $worker = $this->service->update($id, $dto);

        if ($worker === null) {
            toast('Falha ao editar dados do feirante!', 'error');
            return redirect()->back();
        }

        if (isset($worker->errors)) {
            toast('Não foi possivel editar dados do feirante!', 'error');
            return redirect()->back()->withErrors($worker->errors);
        }

        toast('Item editado com sucesso!', 'success');
        return redirect()->route('workers.edit', $worker->data->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = $this->service->delete($id);
        if ($data === null) {
            toast('Falha ao excluir feirante!', 'error');
            return redirect()->back();
        }
        toast('Item eliminado com sucesso!', 'success');
        return redirect()->back();
    }
}