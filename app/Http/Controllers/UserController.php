<?php

namespace App\Http\Controllers;

use App\DTO\Users\CreateUserDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\RoleService;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct(protected UserService $service, protected RoleService $roleService)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->service->getAll();
        confirmDelete();
        return view('users.list_users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $roles = $this->roleService->getAll();
        return view('users.add_users', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $dto = CreateUserDTO::makeFromRequest($request);
        $user = $this->service->new($dto);

        if ($user === null) {
            toast('Falha ao cadastrar novo usuário!', 'error');
            return redirect()->back();
        }

        if (isset($user->errors)) {
            toast('Não foi possivel adicionar o usuário!', 'error');
            return redirect()->back()->withErrors($user->errors);
        }

        toast('Item criado com sucesso!', 'success');
        return redirect()->route('users.create');
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
            toast('Falha ao excluir usuário!', 'error');
            return redirect()->back();
        }
        toast('Item eliminado com sucesso!', 'success');
        return redirect()->back();
    }
}