<?php
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToArray, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        // dd($row);
        // return \App\Models\Student::create([
        //     'first_name' => $row['FIRST NAME'], // G9
        //     'middle_name' => $row['MIDDLE NAME'], // H9
        //     'last_name' => $row['LAST NAME'], // I9
        //     'gender' => $row['GENDER'], // J9
        //     'class_level_id' => $row['CLASS'], // K9
        //     'parent' => $row['PARENT NAME'], // L9
        //     'parent_contact' => $row['PHONE NUMBER'], // M9
        // ]);
    }

    public function headingRow(): int
    {
        return 9; // Specify the row number where the headers are located (e.g., 9th row)
    }

    public function toArray(array $rows)
    {
        // The toArray() method should return the array of data rows in the Excel sheet
        // You can process the data here if needed, but in this case, we will simply return the rows as-is
        return $rows;
    }
}
