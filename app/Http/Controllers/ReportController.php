<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Services\TransactionService;
use PDF;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function __construct(
        protected TransactionService $transactionService,
    ) {
        $this->middleware(EnsureTokenIsValid::class);
    }

    public function transactionPrint(string $transactionID)
    {
        $data = $this->transactionService->findByID($transactionID)->data;
        return PDF::setOption([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->setPaper([0, 0, 219, 377])->loadView('debits.reports.invoice', compact('data'))->stream();

    }
}
