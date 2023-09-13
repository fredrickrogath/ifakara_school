<?php

namespace App\Services\AccountantServices\InvoiceServices;

class ChatOfAccountService
{
    public function getStudentPayments(){
        $currentYear = date('Y');
        return \App\Models\Student::with(['entries', 'classType'])->where('school_id', auth()->user()->school_id)->whereYear('created_at', $currentYear)->orderBy('created_at', 'desc')->get();
    }

    public function getSpecificStudent($request){
        // $currentYear = date('Y');
        return \App\Models\Student::with(['entries', 'classLevel'])->where('id', $request->id)->orderBy('created_at', 'desc')->first();
    }

    public function changeClassLevel($request){
        // $currentYear = date('Y');
        return \App\Models\Student::where('id', $request->studentId)->update(['class_level_id' => $request->classId]);
    }
    
    public function getStudentsNew(){
        return \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getStudentClasses(){
        return \App\Models\ClassLevel::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getSpecificLegerEntries($request){
        return \App\Models\ChartsOfAccount::where('school_id', auth()->user()->school_id)->where('account_type' , $request->type)->get();
    }

    public function getLegerEntries(){
        return \App\Models\Entry::with('chartOfAccount', 'user')->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getChartOfAccounts(){
        return \App\Models\ChartsOfAccount::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function entry($request){
        if($request->isSchoolFee){
            $entry = \App\Models\Entry::create([
                'charts_of_accounts_id' => $request->charts_of_accounts_id,
                'user_id' => auth()->user()->id,
                'level_1' => $request->level_1,
                'level_2' => $request->level_2,
                'level_3' => $request->level_3,
                'narration' => $request->narration,
                'school_id' => auth()->user()->school_id,
    
            ]);


            \App\Models\EntryStudent::create([
                'entry_id' => $entry->id,
                'student_id' => $request->studentId,
            ]);

            return true;
        }

        else if(!$request->isSchoolFee){
            \App\Models\Entry::create([
                'charts_of_accounts_id' => $request->charts_of_accounts_id,
                'user_id' => auth()->user()->id,
                'level_1' => $request->level_1,
                'level_2' => $request->level_2,
                'level_3' => $request->level_3,
                'narration' => $request->narration,
                'school_id' => auth()->user()->school_id,
    
            ]);

            return true;
        }

        // else if(!$request->isSchoolFee && $request->account_type != 'Income'){
        //     \App\Models\Entry::create([
        //         'charts_of_accounts_id' => $request->charts_of_accounts_id,
        //         'user_id' => auth()->user()->id,
        //         'student_id' => null,
        //         'level_1' => $request->level_1,
        //         'level_2' => $request->level_2,
        //         'level_3' => $request->level_3,
        //         'narration' => $request->narration,
        //         'school_id' => auth()->user()->school_id,
    
        //     ]);
        // }

        // \App\Models\TuitionFee::create([
        //     'charts_of_accounts_id' => 2,
        //     'user_id' => 1,
        //     'amount' => ($request->amount * 10) / 100,
        //     'narration' => $request->narration,

        // ]);
    }

    public function updateChartOfAccount($request){
        return \App\Models\ChartsOfAccount::find($request->id)->update([
            $request->column => $request->data
        ]);
    }

    public function deleteChartOfAccounts($request){
        return \App\Models\ChartsOfAccount::findoRFail($request->id)->delete();
    }
    
    public function addChartOfAccounts($request){
        return \App\Models\ChartsOfAccount::create([
            'account_type' => $request->account_type,
            'level1' => $request->level1,
            'level2' => $request->level2,
            'level3' => $request->level3,
            'isSchoolFee' => $request->isSchoolFee,
            'school_id' => auth()->user()->school_id,
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description ,
            'notes' => $request->notes,

        ]);
    }

    public function headDashboardGetStudents(){
        $totalStudents = \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
        $paidStudents = \App\Models\Student::with('entries')->where('school_id', auth()->user()->school_id)->get();
        return [
            'totalStudents' => $totalStudents->count(),
            'paidStudents' => $paidStudents,
        ];
    }
}