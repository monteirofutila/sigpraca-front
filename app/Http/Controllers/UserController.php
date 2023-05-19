<?php

namespace App\Http\Controllers;

use App\DTO\Users\CreateUserDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(protected UserService $service)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->service->getAll();
        return view('users.list_users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('users.add_users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $dto = CreateUserDTO::makeFromRequest($request);
        $user = $this->service->new($dto);

        if (isset($user->errors)) {
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
    }
}