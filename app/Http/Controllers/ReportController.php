<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function report()
    {
        
        $pdf = PDF::loadView('debits.reports.invoice');
        return $pdf->stream();
    }
}
