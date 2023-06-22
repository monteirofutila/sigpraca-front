<?php

namespace App\Http\Controllers;

use App\DTO\Users\CreateUserDTO;
use App\DTO\Users\UpdateUserDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }

        if (isset($user->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($user->errors);
        }

        toast('O item foi adicionado ao sistema com sucesso.', 'success');
        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->service->findById($id)->data;
        $roles = $this->roleService->getAll();
        return view('users.edit_users', compact('roles', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        //
        $dto = UpdateUserDTO::makeFromRequest($request);
        $user = $this->service->update($id, $dto);

        if ($user === null) {
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }

        if (isset($user->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($user->errors);
        }

        toast('As alterações no item foram salvas com sucesso.', 'success');
        return redirect()->route('users.edit', $user->data->id);
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