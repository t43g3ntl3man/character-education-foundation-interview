<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\EmployeeCrud;

class PdfController extends Controller
{
    public function exportPdf()
    {
        // Render the index.blade.php view to HTML
        $employeecruds= EmployeeCrud::all();
        $html = view('employeecruds.pdf' , ['employeecruds'=>$employeecruds])->render();

        // Instantiate Dompdf
        $dompdf = new Dompdf();

        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Set PDF options
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to the browser
        $dompdf->stream('table.pdf');
        return redirect('employeecruds');
    }
}