<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function downloadProductData()
    {
       $data = Product::all();

       $fileName = 'product.pdf';

       $html = view('backend.products.product_pdf', compact('data'))->render();
       $mpdf = new \Mpdf\Mpdf();
       $mpdf->WriteHTML($html);
       $mpdf->Output($fileName,'I');
    }
}
