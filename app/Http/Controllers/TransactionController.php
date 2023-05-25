<?php

namespace App\Http\Controllers;

use App\DTO\Transactions\CreditDebitDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\CreditDebitRequest;
use App\Services\AccountService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(
        protected TransactionService $transactionService,
        protected AccountService $accountService,
    ) {
        $this->middleware(EnsureTokenIsValid::class);
    }


    public function index()
    {
        $transactions = $this->transactionService->getAll();
        return view('transactions.list_transactions', compact('transactions'));
    }

    public function addCredit()
    {
        return view('credits.add_credits');
    }

    public function addDebit()
    {
        return view('debits.add_debits');
    }

    public function confirmationCredit(CreditDebitRequest $request)
    {
        $dto = CreditDebitDTO::makeFromRequest($request);
        $account = $this->accountService->getAccountByWorker($dto->worker_id);

        $data = (object) [
            'worker_id' => $dto->worker_id,
            'password' => $dto->password,
            'balance' => $account->data->balance,
            'name' => $account->data->worker->name,
            'value_credit' => null,
        ];

        return view('credits.confirmation_credits', compact('data'));
    }

    public function confirmationDebit(CreditDebitRequest $request)
    {
        $dto = CreditDebitDTO::makeFromRequest($request);
        $account = $this->accountService->getAccountByWorker($dto->worker_id);

        $data = (object) [
            'worker_id' => $dto->worker_id,
            'password' => $dto->password,
            'balance' => $account->data->balance,
            'name' => $account->data->worker->name,
            'value_debit' => null,
        ];

        return view('debits.confirmation_debits', compact('data'));
    }

    public function storeCredit(CreditDebitRequest $request)
    {
        $dto = CreditDebitDTO::makeFromRequest($request);
        $transaction = $this->transactionService->addCredit($dto);

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

    public function storeDebit(CreditDebitRequest $request)
    {
        $dto = CreditDebitDTO::makeFromRequest($request);
        $transaction = $this->transactionService->addDebit($dto);

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
