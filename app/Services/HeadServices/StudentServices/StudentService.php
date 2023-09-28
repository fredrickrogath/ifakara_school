<?php

namespace App\Services\HeadServices\StudentServices;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE INVOICE
    |--------------------------------------------------------------------------
    */

    public function addStudent($request){
        $created = \App\Models\Student::create([
            'class_level_id' => $request->classLevel,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'gender' => $request->gender,
            'from' => $request->location,
            'parent' => $request->parent,
            'parent_contact' => $request->contact,
            'school_id' => auth()->user()->school_id,
        ]);

        if($created){
            return true;
        }
        return false;
    }

    
public function processExcelFile($request)
{
    $file = $request->file('file');
    
    // Import Excel data using StudentImport class
    $data = Excel::import(new StudentImport, $file);

    // Assuming the data you want is in the first sheet (index 0)
    // $dataArray = collect($data[0])->filter(function($row) {
    //     // Filter out rows with all null or empty values
    //     return !empty(array_filter($row));
    // })->values()->toArray();

    // Start a database transaction
    // DB::beginTransaction();

    try {
        // foreach ($dataArray as $dataRow) {
        //     // Retrieve the 'class_level_id' for each row's 'class' value
        //     $classLevel = \App\Models\ClassLevel::where('class_level', $dataRow['class'])->first();
    
        //     if ($classLevel) {
        //         // Create a new Student model instance and fill it with data
        //         $student = \App\Models\Student::create([
        //             'class_level_id' => $classLevel->id,
        //             'first_name' => $dataRow['first_name'],
        //             'middle_name' => $dataRow['middle_name'],
        //             'last_name' => $dataRow['last_name'],
        //             'gender' => $dataRow['gender'],
        //             'from' => $dataRow['from'],
        //             'parent' => $dataRow['parent_name'],
        //             'parent_contact' => $dataRow['phone_number'],
        //             'school_id' => auth()->user()->school_id,
        //         ]);
        //         return json_encode($student->id);
        //         // Save the model to the database
        //         // $student->save();
        //     } else {
        //         // Handle the case where 'class' value doesn't match any 'class_level'
        //         // You can log an error or take appropriate action here
        //     }
        // }

        // // Commit the transaction
        // // DB::commit();

        // return response()->json(['message' => 'Data inserted successfully']);
    } catch (\Exception $e) {
        // Rollback the transaction in case of an error
        // DB::rollback();

        return response()->json(['message' => 'Data insertion failed. Error: ' . $e->getMessage()], 500);
    }
}
//     public function processExcelFile($request)
// {
//     $file = $request->file('file');
    
//     // Import Excel data using StudentImport class
//     $data = Excel::toArray(new StudentImport, $file);

//     // Assuming the data you want is in the first sheet (index 0)
//     $dataArray = collect($data[0])->filter(function($row) {
//         // Filter out rows with all null or empty values
//         return !empty(array_filter($row));
//     })->values()->toArray();

//     // Chunk the data into smaller arrays of 100 rows each (adjust the size as needed)
//     $chunks = array_chunk($dataArray, 100);

//     // Start a database transaction
//     DB::beginTransaction();

//     try {
//         foreach ($chunks as $chunk) {
//             // Insert each chunk into the database using batch insertion
//             Student::insert($chunk);
//         }

//         // Commit the transaction
//         DB::commit();

//         return response()->json(['message' => 'Data inserted successfully']);
//     } catch (\Exception $e) {
//         // Rollback the transaction in case of an error
//         DB::rollback();

//         return response()->json(['message' => 'Data insertion failed. Error: ' . $e->getMessage()], 500);
//     }
// }

    // public function processExcelFile($request){

    //     $file = $request->file('file');

    //     $data = Excel::toArray(new StudentImport, $file);

    // // Assuming the data you want is in the first sheet (index 0)
    // $dataArray = collect($data[0])->filter(function($row) {
    //     // Filter out rows with all null or empty values
    //     return !empty(array_filter($row));
    // })->values()->toArray();

    // return response()->json($dataArray);
    
    //      // Import Excel data using ProductImport class
    //     //  Excel::toCollection(new StudentImport, $file);
    //      return response()->json(Excel::toArray(new StudentImport, $file));
    //      return response()->json(['message' => 'Data imported successfully.'], 200);
    //      try {
    //     } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
    //         $failures = $e->failures();
            
    //         // Handle validation failures (if any)
    //         // You can access the validation errors using $failures variable
            
    //         return response()->json(['message' => 'Data import failed.'], 400);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'An error occurred while importing data.'], 500);
    //     }

    //     // return $request->hasFile('file');
    //     // $created = \App\Models\Student::create([
    //     //     'class_level_id' => $request->classLevel,
    //     //     'first_name' => $request->firstName,
    //     //     'middle_name' => $request->middleName,
    //     //     'last_name' => $request->lastName,
    //     //     'gender' => $request->gender,
    //     //     'from' => $request->location,
    //     //     'parent' => $request->parent,
    //     //     'parent_contact' => $request->contact,
    //     //     'school_id' => auth()->user()->school_id,
    //     // ]);

    //     // if($created){
    //     //     return true;
    //     // }
    //     // return false;
    // }
    
    public function getInvoices(){
        return \App\Models\Invoice::with('tools', 'sellers', 'toolSum', 'invoiceTool.tool')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getStudentPayments(){
        $currentYear = date('Y');
        return \App\Models\Student::with(['entries', 'classType'])->where('school_id', auth()->user()->school_id)->whereYear('created_at', $currentYear)->orderBy('created_at', 'desc')->get();
    }

    // public function getInvoiceView($request){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('status', true)->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    // }

    public function getStudentClasses(){
        return \App\Models\ClassLevel::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getStudents(){
        return \App\Models\Student::with('classType')->where('school_id', auth()->user()->school_id)->orderBy('first_name', 'asc')->get();
    }

    public function getStudentsNew(){
        return \App\Models\Student::with('classType')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function headDashboardGetStudents(){
        $totalStudents = \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
        $paidStudents = \App\Models\Student::with('entries')->where('school_id', auth()->user()->school_id)->get();
        return [
            'totalStudents' => $totalStudents->count(),
            'paidStudents' => $paidStudents,
        ];
    }
    
    public function getStudent($request){
        return \App\Models\Student::where('id', $request->studentId)->get()->first();
    }

    // public function getComments($request){
    //     $notification = \App\Models\Notification::with('comments')->where('object_id', $request->id)->get()->first();
    // return $notification;
    // }

    public function getComments($request){
        $notification = \App\Models\Notification::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->where('school_id', auth()->user()->school_id)
        ->where('object_id', $request->id)
        ->get()
        ->first();
        return $notification;
    }

    public function editStudent($request){
        return \App\Models\Student::find($request->studentId)->update([
            'class_level_id' => $request->class_level_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'from' => $request->from,
            'parent' => $request->parent,
            'parent_contact' => $request->parent_contact,
            'school_id' => auth()->user()->school_id,
        ]);
    }

    public function sendComment($request){
        $notification = \App\Models\Notification::where('id', $request->id)->get()->first();
        
        $created = \App\Models\Comment::create([
            'to_role' => \App\Models\User::is_secretary,
            'from_role' => \App\Models\User::is_head,
            'body' => $request->body,
            'notification_id' => $notification->id,
        ]);

        if($created){
            return true;
        }else{
            return false;
        }
    }

    // public function acceptInvoice($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         'status_from_financial' => !$request->status_from_financial,
    //     ]);
    // }

    // public function deleteInvoice($request){
    //     return \App\Models\Invoice::findoRFail($request->id)->delete();
    // }

    // public function starredInvoices($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         $request->column => !$request->data
    //     ]);
    // }

    // public function starredInvoice($request){
    //     return \App\Models\Invoice::find($request->id)->update([
    //         $request->column => !$request->data
    //     ]);
    // }

    // public function getTrashedInvoices(){
    //     return \App\Models\Invoice::onlyTrashed()->with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->orderBy('created_at', 'desc')->get();
    // }

    // public function getStarredInvoices(){
    //     return \App\Models\Invoice::with('tools', 'seller', 'toolSum', 'invoiceTool.tool')->where('starred', true)->where('status', true)->orderBy('created_at', 'desc')->get();
    // }

    // public function restoreInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->restore();
    // }

    // public function permanentDeleteInvoice($request){
    //     return \App\Models\Invoice::onlyTrashed()->findoRFail($request->id)->forceDelete();
    // }
}