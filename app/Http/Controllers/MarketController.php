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
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->back();
        }

        if (isset($market->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($market->errors);
        }

        toast('As alterações no item foram salvas com sucesso.', 'success');
        return redirect()->route('markets.edit');
    }

}