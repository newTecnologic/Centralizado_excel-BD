<?php

namespace App\Http\Controllers;

use App\Exports\CSVExport;
use App\Imports\CSVImport;
use App\Models\Prueba;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\StorePruebaRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pruebas = Prueba::all();
        return view('pruebas')->with('pruebas', $pruebas);
    }

    public function main()
    {
        $main = Prueba::all();
        return view('main')->with('main', $main);
    }
    public function random(){
        $password = Str::random(8);
    }
    public function borrarDatos(){
        Prueba::truncate();
        return redirect()->route('prueba')->with('success', 'Datos eliminados exitosamente');
    }
    public function importPruebas()
    {
        return view('prueba');
    }
    public function importar(StorePruebaRequest $request){
        Prueba::truncate();
        if($request->hasFile('documento')){
            Excel::import(new CSVImport, $request->documento);
            return redirect()->route('prueba')->with('success','Prueba importada exitosamente');
            // return view('prueba', ['success' => 'Prueba importada exitosamente', 'exportButtonEnabled' => true]);
        }else{
            return redirect()->route('prueba')->with('error', 'No se ha seleccionado un archivo para importar.');
        }
    }
    public function exportar()
    {
        return Excel::download(new CSVExport, 'unifranz_' . Carbon::now()->format('Y-m-d_His') . '.xlsx');
    }
    // * Show the form for creating a new resource.
    //  */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // public function exportar()
    // {
    //     $pruebas = Prueba::all();
    //     Prueba::create('prueba', function($excel) use ($pruebas){
    //         $excel->sheet('Exportar', function($sheet) use ($pruebas){
    //             $sheet->fromArray($pruebas);
    //         });
    //     })->exportar('xls');
    // }
    // public function importar(Request $request){
    //     $path = $request->file('csv_file')->getRealPath();
    //     Excel::import(new CSVImport, $path);
    //     return redirect()->route('prueba')->with('success', 'Prueba importada exitosamente');
    // }
    // public function importar(Request $request){
    //     if ($request->hasFile('documento')) {
    //         $path = $request->file('documento')->getRealPath();

    //         // Especifica explícitamente que estás importando un archivo CSV
    //         $import = $excel->import(new CSVImport, $path, Excel::CSV);

    //         return redirect()->route('prueba')->with('success', 'Prueba importada exitosamente');
    //     } else {
    //         return redirect()->route('prueba')->with('error', 'No se ha seleccionado un archivo para importar.');
    //     }
    // }


    // public function importar(Request $request){
    // if($request->hasFile('documento')){
    //     $path = $request->file('documento')->getRealPath();
    //     $datos = Excel::import($path, function($reader){
    //     })->get();
    //     if(!empty($datos) && $datos->count()){
    //         $datos = $datos->toArray();
    //         for($i=0; $i< count($datos); $i++){
    //             $datosImportar[] = $datos[$i];
    //         }
    //     }
    //     Prueba::insert($datosImportar);
    // }
    // return back();
    // }
    // public function exportExcel()
//     {
//         return Excel::download(new YourExportClass, 'archivo_exportado.xlsx');
//     }
}
