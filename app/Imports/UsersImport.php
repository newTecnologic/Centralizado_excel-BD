<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    // public function mapping(): array
    // {
    //     return [
    //         'name'  => 'B',
    //     ];
    // }
    public function model(array $row)
    {
        $user = new User([
            "name" => $row['name'],
            "continua"=>$row['continua'],
            "procesual" => $row['procesual'],
        ]);
        return $user;
    }
}
