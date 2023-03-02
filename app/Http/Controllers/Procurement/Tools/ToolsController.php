<?php

namespace App\Http\Controllers\Procurement\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProcurementServices\ToolServices\ToolService;

class ToolsController extends Controller
{
    //
    public function add_tool(Request $request ,ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->add_tool($request)]);
    }

    public function get_tools(Request $request ,ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $toolService->get_tools()]);
    }

    public function updateTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->updateTools($request)]);
    }

    public function deleteTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->deleteTools($request)]);
    }

    public function starredTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->starredTools($request)]);
    }
}
