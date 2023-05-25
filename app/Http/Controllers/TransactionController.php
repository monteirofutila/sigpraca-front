<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(protected TransactionService $service, )
    {
        $this->middleware(EnsureTokenIsValid::class);
    }


    public function index()
    {
        $transactions = $this->service->getAll();
        return view('transactions.list_transactions', compact('transactions'));
    }

    public function addCredit()
    {
        return view('credits.add_credits');
    }

    public function storeCredit(Request $request)
    {
        $transaction = $this->service->addCredit($request->workerID);

        if ($transaction === null) {
            toast('Falha ao adicionar crédito!', 'error');
            return redirect()->back();
        }

        if (isset($transaction->errors)) {
            toast('Não foi possivel adicionar crédito ao vendedor!', 'error');
            return redirect()->back()->withErrors($transaction->errors);
        }

        toast('Item adicionado com sucesso!', 'success');
        return redirect()->route('transactions.credit');
    }

    public function addDebit()
    {
        return view('debits.add_debits');
    }

    public function storeDebit(Request $request)
    {
        $transaction = $this->service->addDebit($request->workerID);

        if ($transaction === null) {
            toast('Falha ao adicionar débito!', 'error');
            return redirect()->back();
        }

        if (isset($transaction->errors)) {
            toast('Não foi possivel adicionar débito ao vendedor!', 'error');
            return redirect()->back()->withErrors($transaction->errors);
        }

        toast('Item adicionado com sucesso!', 'success');
        return redirect()->route('transactions.debit');
    }

}