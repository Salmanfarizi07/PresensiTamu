<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Mpdf\Mpdf;

class PdfController extends Controller
{
    public function cetakTamu(Request $request)
    {
        // Ambil filter tanggal jika ada
        $start = $request->start_date;
        $end   = $request->end_date;

        $query = Submission::query();

        if ($start && $end) {
            $query->whereDate('created_at', '>=', $start)
                  ->whereDate('created_at', '<=', $end);
        }

        $tamu = $query->orderBy('created_at', 'asc')->get();

        // Render view PDF
        $html = view('pdf.pdf', compact('tamu', 'start', 'end'))->render();

        // Generate PDF (A4 landscape + margin)
        $mpdf = new Mpdf([
            'format' => 'A4-L', // Landscape
            'margin_top' => 15,
            'margin_bottom' => 15,
            'margin_left' => 10,
            'margin_right' => 10,
        ]);

        $mpdf->WriteHTML($html);

        $filename = 'data-tamu_' . ($start ?? 'all') . '_sampai_' . ($end ?? 'all') . '.pdf';
        $mpdf->Output($filename, 'I'); // tampilkan di browser
    }
}
