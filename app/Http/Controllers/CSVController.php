<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Imports\CSVImport;
use App\Exports\CSVExport;

class CSVController extends Controller
{
    public function showImportForm()
{
    return view('import');
}
public function importCSV(Request $request)
{
    $file = $request->file('csv_file');
    $import = new CSVImport;
    $data = Excel::toColllection($import, $file);
    // Validar y procesar el archivo CSV si es necesario
    return view('show', ['data' => $data]);
    // return back()->with('status', 'Archivo CSV importado con éxito.');
}

public function exportCSV()
{
    return Excel::download(new CSVExport, 'archivo_exportado.csv');
}
}
