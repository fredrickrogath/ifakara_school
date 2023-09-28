<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $classLevel = \App\Models\ClassLevel::where('class_level', $row['class'])->first();
        
        return new Student([
            'first_name' => $row['first_name'], // G9
            'middle_name' => $row['middle_name'], // H9
            'last_name' => $row['last_name'], // I9
            'gender' => $row['gender'], // J9
            'class_level_id' => $classLevel->id, // K9
            'from' => $row['from'],
            'parent' => $row['parent_name'], // L9
            'parent_contact' => $row['phone_number'], // M9
            'school_id' => auth()->user()->school_id, // M9
        ]);
    }
}
