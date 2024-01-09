<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\YourImportClass;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    public function importExcel(Request $request)
{
    $file = $request->file('excel_file');

    Excel::import(new UsersImport, $file);
    // Realiza operaciones en la base de datos si es necesario
    // ...
    return redirect()->back()->with('success', 'Datos importados exitosamente.');
}

public function exportExcel()
{
    return Excel::download(new UsersImport, 'archivo_exportado.xlsx');
}
}
