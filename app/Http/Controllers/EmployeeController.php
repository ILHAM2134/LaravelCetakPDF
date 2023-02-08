<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;

class EmployeeController extends Controller
{
    // Display user data in view
    public function showEmployees(){
       $employee = Employee::all();
       return view('index', compact('employee'));
    }

    // Generate PDF
    public function createPDF() {

      // retreive all records from db
      $dataServe = Employee::all();

      // share data to view
      view()->share('employee', compact('dataServe'));
      $pdf = PDF::loadView('pdf_view', compact('dataServe'));

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }
}