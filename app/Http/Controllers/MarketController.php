<?php

namespace App\Http\Controllers;

use App\DTO\Users\MarketDTO;
use App\Http\Requests\MarketRequest;
use App\Services\MarketService;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function __construct(protected MarketService $service)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    public function edit()
    {
        //
        $data = $this->service->getFirst();
        return view('markets.list_workers', compact('data'));
    }

    public function update(MarketRequest $request, string $id)
    {
        $dto = MarketDTO::makeFromRequest($request);
        $worker = $this->service->new($dto);

        if ($worker === null) {
            toast('Falha ao cadastrar novo vendedor!', 'error');
            return redirect()->back();
        }

        if (isset($worker->errors)) {
            toast('Não foi possivel adicionar o vendedor!', 'error');
            return redirect()->back()->withErrors($worker->errors);
        }

        toast('Item criado com sucesso!', 'success');
        return redirect()->route('workers.create');
    }

}