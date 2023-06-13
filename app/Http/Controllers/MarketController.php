<?php

namespace App\Http\Controllers;

use App\DTO\Markets\MarketDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\MarketRequest;
use App\Services\MarketService;

class MarketController extends Controller
{
    public function __construct(protected MarketService $service)
    {
        $this->middleware(EnsureTokenIsValid::class);
    }

    public function edit()
    {
        //
        $data = $this->service->getFirst()->data;
        return view('markets.edit_markets', compact('data'));
    }

    public function update(MarketRequest $request)
    {
        $dto = MarketDTO::makeFromRequest($request);
        $market = $this->service->update($dto);

        if ($market === null) {
            toast('Falha ao actualizado dados!', 'error');
            return redirect()->back();
        }

        if (isset($market->errors)) {
            toast('Não foi possivel adicionar o vendedor!', 'error');
            return redirect()->back()->withErrors($market->errors);
        }

        toast('Item actualizado com sucesso!', 'success');
        return redirect()->route('markets.edit');
    }

}