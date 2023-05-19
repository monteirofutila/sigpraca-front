<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }


    public function index()
    {
        return view('transactions.list_transactions');
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