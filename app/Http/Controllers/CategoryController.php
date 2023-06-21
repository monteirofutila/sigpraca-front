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
            toast('Falha ao cadastrar nova categoria!', 'error');
            return redirect()->back();
        }

        if (isset($category->errors)) {
            toast('Não foi possivel adicionar a categoria!', 'error');
            return redirect()->back()->withErrors($category->errors);
        }

        toast('Item criado com sucesso!', 'success');
        return redirect()->route('categories.create');
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
        $data = $this->service->delete($id);
        if ($data === null) {
            toast('Falha ao excluir categoria!', 'error');
            return redirect()->back();
        }
        toast('Item eliminado com sucesso!', 'success');
        return redirect()->back();
    }
}