<?php

namespace App\Http\Controllers;

use App\DTO\Categories\CategoryDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->service->getAll();
        confirmDelete();
        return view('categories.list_categories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('categories.add_categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $dto = CategoryDTO::makeFromRequest($request);
        $category = $this->service->new($dto);

        if ($category === null) {
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }

        if (isset($category->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($category->errors);
        }

        toast('O item foi adicionado ao sistema com sucesso.', 'success');
        return redirect()->route('categories.create');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->service->findById($id)->data;
        return view('categories.edit_categories', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        //
        $dto = CategoryDTO::makeFromRequest($request);
        $category = $this->service->update($id, $dto);

        if ($category === null) {
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }

        if (isset($category->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($category->errors);
        }

        toast('As alterações no item foram salvas com sucesso.', 'success');
        return redirect()->route('categories.edit', $category->data->id);
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