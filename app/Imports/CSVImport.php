<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Prueba;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithValidation;

class CSVImport implements ToModel, WithHeadingRow, WithMapping
{
    /**
    * @param Collection $collection
    */
    // buscar campos-excel
    public function map($row): array
    {
        $valorI = $row['procesual'];
        $operacionI = round(($valorI * 15)/100);
        $valorII = $row['continua'];
        $operacionII = round(($valorII * 15)/100);
        return [
            'campo1' => $row['name'],
            'campo2' => $operacionI,
            'campo3' => $operacionII,
        ];
    }
    // validaciones-campo numerico
    // importarlos-DB
    public function model(array $row)
    {
        $password = Str::random(8);
        $passwordEncriptada = Hash::make($password);
        $prueba = new Prueba([
            "name" => $row['campo1'],
            "procesual" => $row['campo2'],
            "continua" => $row['campo3'],
            "password" => $passwordEncriptada,
        ]);
        DB::table('prueba');
        return $prueba;
    }
}
