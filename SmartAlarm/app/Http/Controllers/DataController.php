<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;
use App\Models\Data;

class DataController extends Controller
{
    public function DataImport() 
    {
        //$data =Excel::import(new DataImport, public_path('data.csv'));
        $data=Data::all();
        return view('welcome',compact('data'));

    }
}