<?php

namespace App\Http\Controllers;

use App\DTO\Workers\WorkerDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\WorkerRequest;
use App\Services\AccountService;
use App\Services\CategoryService;
use App\Services\WorkerService;

class WorkerController extends Controller
{
    public function __construct(
        protected WorkerService $service,
        protected AccountService $accountService,
        protected CategoryService $categoryService
    ) {
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
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }

        if (isset($worker->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($worker->errors);
        }

        toast('O item foi adicionado ao sistema com sucesso.', 'success');
        return redirect()->route('workers.create');

    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
        $account = $this->accountService->getAccountByWorker($id)->data;
        $data = $account->worker; //dados do feirante
        $category = $account->category->name; //categoria do feirante
        $categories = $this->categoryService->getAll(); //lista de categorias
        return view('workers.edit_workers', compact('data', 'categories', 'category'));
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
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }

        if (isset($worker->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($worker->errors);
        }

        toast('As alterações no item foram salvas com sucesso.', 'success');
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
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }
        toast('O item selecionado foi removido com sucesso.', 'success');
        return redirect()->back();
    }
}