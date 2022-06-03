<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'night'     => $row[0],
            'date'    => $row[1], 
            'time' => $row[2],
            'motion' => $row[3],
            'temperature' => $row[4],
        ]);
    }
}
