<?php

namespace App\Http\Controllers;

use App\DTO\Transactions\DebitDTO;
use App\DTO\Transactions\CreditDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\DebitRequest;
use App\Http\Requests\CreditRequest;
use App\Services\AccountService;
use App\Services\TransactionService;

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

    public function confirmationCredit(CreditRequest $request)
    {
        $dto = CreditDTO::makeFromRequest($request);
        $account = $this->accountService->getAccountByWorker($dto->worker_id);

        $data = (object) [
            'worker_id' => $dto->worker_id,
            'password' => $dto->password,
            'balance' => $account->data->balance,
            'name' => $account->data->worker->name,
            'category' => $account->data->category->name,
            'value_credit' => $dto->amount,
        ];

        return view('credits.confirmation_credits', compact('data'));
    }

    public function confirmationDebit(DebitRequest $request)
    {
        $dto = DebitDTO::makeFromRequest($request);
        $account = $this->accountService->getAccountByWorker($dto->worker_id);
        $data = (object) [
            'worker_id' => $dto->worker_id,
            'password' => $dto->password,
            'balance' => $account->data->balance,
            'name' => $account->data->worker->name,
            'category' => $account->data->category->name,
            'value_debit' => $account->data->category->debit_amount,
        ];

        return view('debits.confirmation_debits', compact('data'));
    }

    public function storeCredit(CreditRequest $request)
    {
        $dto = CreditDTO::makeFromRequest($request);
        $transaction = $this->transactionService->addCredit($dto);

        if (!$transaction) {
            alert()->error('Password incorreta. Certifique-se de digitar corretamente.');
            return redirect()->route('transactions.credit');
        }

        if (isset($transaction->message)) {
            alert()->error($transaction->message);
            return redirect()->route('transactions.credit');
        }

        if ($transaction === null) {
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->route('transactions.credit');
        }

        if (isset($transaction->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($transaction->errors);
        }

        toast('Pagamento realizado com sucesso!', 'success');
        return redirect()->route('reports.transaction', $transaction->data->id);
    }

    public function storeDebit(DebitRequest $request)
    {
        $dto = DebitDTO::makeFromRequest($request);
        $transaction = $this->transactionService->addDebit($dto);

        if (!$transaction) {
            alert()->error('Password incorreta. Certifique-se de digitar corretamente.');
            return redirect()->route('transactions.debit');
        }

        if (isset($transaction->message)) {
            alert()->error($transaction->message);
            return redirect()->route('transactions.debit');
        }

        if ($transaction === null) {
            alert()->error('Desculpe, ocorreu um erro. Por favor, tente novamente.');
            return redirect()->route('transactions.debit');
        }

        if (isset($transaction->errors)) {
            toast('Por favor, verifique as informações fornecidas!', 'error');
            return redirect()->back()->withErrors($transaction->errors);
        }

        toast('Pagamento realizado com sucesso!', 'success');
        return redirect()->route('reports.transaction', $transaction->data->id);
    }
}