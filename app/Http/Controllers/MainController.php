<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class MainController extends Controller
{
    /** @var \Barryvdh\DomPDF\PDF | null $Pdf */
    protected $Pdf = null;

    function __construct()
    {
        $this->Pdf = PDF::setOptions(['dpi' => 1200, 'defaultFont' => 'sans-serif'])->setPaper('A5', 'landscape');
    }

    public function kwitansi(Request $request)
    {
        if ($request->all()) {
            /** @var \Barryvdh\DomPDF\PDF $Pdf */
            $Pdf = clone $this->Pdf;
            $title = 'Kwitansi';
            $request->offsetSet('tanggal', \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('d M Y'));
            $data = $request->all();
            $Pdf->loadView('prints/kwitansi', get_defined_vars());
            $filename = 'KWITANSI_' . date('YmdHis') . '.pdf';
            return $Pdf->stream($filename);
        }
        return view('kwitansi');
    }

    public function invoice(Request $request)
    {
        if ($request->all()) {
            /** @var \Barryvdh\DomPDF\PDF $Pdf */
            $Pdf = clone $this->Pdf;
            $title = 'Invoice';
            $request->offsetSet('tanggal', \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('d/m/Y'));
            $data = $request->all();
            $Pdf->loadView('prints/invoice', get_defined_vars());
            $filename = 'INVOICE_' . date('YmdHis') . '.pdf';
            return $Pdf->stream($filename);
        }
        return view('invoice');
    }
}