<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = User::all();

        $pdf = PDF::loadView('pdf.document', ['data' => $data]);

        return $pdf->download('transaction.pdf');
    }
}