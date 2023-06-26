<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(
        protected AccountService $accountService,
    ) {
        $this->middleware(EnsureTokenIsValid::class);
    }

    public function index()
    {
        return view('accounts.search_accounts');
    }

    public function show($workerID)
    {
        $account = $workerID !== null ? $this->accountService->getAccountByWorker($workerID) : null;

        if (isset($account->message)) {
            alert()->error($account->message);
            return redirect()->back();
        }

        $worker = $account->data->worker;
        $transactions = $account->data->transactions;
        return view('accounts.show_accounts', compact('worker', 'transactions', 'account'));
    }

    public function search(Request $request)
    {
        $workerID = $request->workerID;
        return redirect()->route('accounts.show', $workerID);
    }

}