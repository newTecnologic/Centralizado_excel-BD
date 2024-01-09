<?php

namespace App\Http\Controllers;
use importUsers;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
class UserController extends Controller
{
    public function importUsers()
    {
        return view('users.import');
    }
    public function uploadUsers(Request $request)
    {
        Excel::import(new UserImport, $request->file);
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }
}

// public function importUsers()
// {
//     return view('users.import');
// }
// public function uploadUsers(Request $request)
//  {
//     Excel::import(new UsersImport, $request->file);
//     return redirect()->route('users.index')->with('success','User Imported Successfully');
//  }
