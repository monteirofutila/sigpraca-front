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

    public function addDebit()
    {
        return view('debits.add_debits');
    }

}