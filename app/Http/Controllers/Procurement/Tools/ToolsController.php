<?php

namespace App\Http\Controllers\Procurement\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProcurementServices\ToolServices\ToolService;

class ToolsController extends Controller
{
    //
    public function add_tool(Request $request ,ToolService $toolService){
        // $this->authorize('authorizeProcurement', \App\Models\User::class); 
        // return response()->json(['data' => $toolService->add_tool()]);
        return response()->json($request->all());
    }

    public function get_tools(Request $request ,ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $toolService->get_tools()]);
        // return response()->json($request->all());
    }
}
