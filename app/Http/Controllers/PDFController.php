<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Validator;

class PDFController extends Controller
{
    public function showHTMLonBrowser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company_name = $request->input('company_name');
        $name = $request->input('name');
        $email = $request->input('email');
        $date = $request->input('date');
        // $selectedOption = 'portrait';

        $data = [
            'company_name' => $company_name,
            'name' => $name,
            'email' => $email,
            'date' => $date,
            // 'selectedOption' => 'portrait'
        ];

        // on browser
        return PDF::loadView('pdf.pdf', $data)
            ->setOption('encoding', 'utf-8')
            ->inline();

        // download pdf
        // $pdf = PDF::loadView('pdf.pdf', $data);
        // return $pdf->download('invoice.pdf');
    }

    public function downloadPDF(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company_name = $request->input('company_name');
        $name = $request->input('name');
        $email = $request->input('email');
        $date = $request->input('date');
        // $selectedOption = 'portrait';

        $data = [
            'company_name' => $company_name,
            'name' => $name,
            'email' => $email,
            'date' => $date,
            // 'selectedOption' => 'portrait'
        ];

        // download pdf
        $pdf = PDF::loadView('pdf.pdf', $data);
        return $pdf->download('invoice.pdf');
    }
}
