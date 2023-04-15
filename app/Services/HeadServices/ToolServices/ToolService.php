<?php

namespace App\Services\HeadServices\ToolServices;

class ToolService
{
    /*
    |--------------------------------------------------------------------------
    | QUERIES FOR THE TOOL
    |--------------------------------------------------------------------------
    */

    public function add_tool($request){
        $created = \App\Models\Tool::create([
            'name' => $request->name,
            'price' => $request->price,
            'count' => $request->count,
            'description' => $request->narration,

        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function get_tools(){
        return \App\Models\Tool::orderBy('created_at', 'desc')->get();
    }

    public function headDashboardGetTools(){
        $totalTools = \App\Models\Tool::orderBy('created_at', 'desc')->get();
        $newTools = 1;
        $brokenTools = 0;
        return [
            'totalTools' => $totalTools->count(),
            'newTools' => $newTools,
            'brokenTools' => $brokenTools,
        ];
    }
    
    public function getStarredTools(){
        return \App\Models\Tool::where('starred', true)->orderBy('created_at', 'desc')->get();
    }

    public  function getTrashedTools(){
        return \App\Models\Tool::onlyTrashed()->orderBy('created_at', 'desc')->get();
    }
    
    public function updateTools($request){
        return \App\Models\Tool::find($request->id)->update([
            $request->column => $request->data
        ]);
    }

    public function deleteTools($request){
        return \App\Models\Tool::findoRFail($request->id)->delete();
    }

    public function restoreTools($request){
        return \App\Models\Tool::onlyTrashed()->findoRFail($request->id)->restore();
    }

    public function permanentDeleteTools($request){
        return \App\Models\Tool::onlyTrashed()->findoRFail($request->id)->forceDelete();
    }
    
    public function starredTools($request){
        return \App\Models\Tool::find($request->id)->update([
            $request->column => !$request->data
        ]);
    }
}