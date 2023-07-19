<?php

namespace App\Services\ProcurementServices\ToolServices;

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
            'school_id' => auth()->user()->school_id,
            'user_id' => auth()->user()->id,
            'description' => $request->narration,

        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function addSeller($request){
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');
        
        $created = \App\Models\Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'path' => $filePath,
            'location' => $request->location,
            'user_id' => auth()->user()->id,
            'school_id' => auth()->user()->school_id,
            'mobile' => $request->mobile,
            'description' => $request->description,
        ]);

        if($created){
            return true;
        }
        return false;
    }

    public function get_tools(){
        return \App\Models\Tool::where('broken', false)->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getToolsForInternalAuditor($request){
        return \App\Models\Tool::where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
    }

    public function getSellersList(){
        return \App\Models\Seller::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }
    
    public function getBrokenTools(){
        return \App\Models\Tool::where('broken', true)->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }
    
    public function getStarredTools(){
        return \App\Models\Tool::where('starred', true)->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }

    public  function getTrashedTools(){
        return \App\Models\Tool::onlyTrashed()->where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
    }
    
    public function updateTools($request){
        return \App\Models\Tool::find($request->id)->update([
            $request->column => $request->data
        ]);
    }

    public function addBrokenTool($request){
        $tool = \App\Models\Tool::where('name' ,$request->toolName);
        
        // return $tool->count();
        if($tool->count() == 1){
            $tool = $tool->get()->first();
            $created = \App\Models\Tool::create([
                'name' => $tool->name,
                'price' => $tool->price,
                'count' => $tool->count,
                'broken' => true,
                'user_id' => auth()->user()->id,
                'school_id' => auth()->user()->school_id,
                'description' => $tool->narration,
    
            ]);
            if($created){
                return true;
            }
        }else{
            $tool = $tool->where('broken', true)->get()->first();
            $tool->update([
                'count' => $tool->count + $request->count,
            ]);

            return true;
        }
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

    public function headDashboardGetTools(){
        $totalTools = \App\Models\Tool::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
        $newTools = 1;
        $brokenTools = 0;
        return [
            'totalTools' => $totalTools->count(),
            'newToolTitle' => 'New Tools',
            'newTools' => $newTools,
            'brokenToolTitle' => 'Broken Tool',
            'brokenTools' => $brokenTools,
        ];
    }

    public function getToolDashboardData(){
        $totalTools = \App\Models\Tool::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
        $newTools = 1;
        $brokenTools = 0;
        
        return [
            'totalTools' => $totalTools->count(),
            'newToolTitle' => 'New Tools',
            'newTools' => $newTools,
            'brokenToolTitle' => 'Broken Tool',
            'brokenTools' => $brokenTools,
        ];
    }

    public function getToolDashboardDataToFinancial($request){
        $totalTools = \App\Models\Tool::where('school_id', $request->school_id)->orderBy('created_at', 'desc')->get();
        $newTools = 1;
        $brokenTools = 0;
        
        return [
            'totalTools' => $totalTools->count(),
            'newToolTitle' => 'New Tools',
            'newTools' => $newTools,
            'brokenToolTitle' => 'Broken Tool',
            'brokenTools' => $brokenTools,
        ];
    }
}