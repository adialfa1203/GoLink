<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\DetailTransactionService;
use App\Services\CallbackService;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;

class PDFController extends Controller
{
    protected $privateKey = 'CK3tY-WMaEe-U2niV-eDYKP-5hZTB';

    private DetailTransactionService $service;
    private CallbackService $callbackService;
    public function __construct(DetailTransactionService $service, CallbackService $callbackService)
    {
        $this->service = $service;
        $this->callbackService = $callbackService;
    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($reference)
    {
        $data = User::all();
        $detailTransaction = $this->service->detail($reference);
        $detailTransaction = json_decode($detailTransaction);
        $transaction = Transaction::where('reference', $reference)
            ->with('subscribe')->first();
// dd($detailTransaction);
        // Pass $data and $detailTransaction to the view
        $pdf = PDF::loadView('pdf.document', ['data' => $data, 'detailTransaction' => $detailTransaction]);

        return $pdf->download('transaction.pdf');

    }
}
