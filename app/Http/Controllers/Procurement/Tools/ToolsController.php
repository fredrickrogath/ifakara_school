<?php

namespace App\Http\Controllers\Procurement\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProcurementServices\ToolServices\ToolService;

class ToolsController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }

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

    public function getStarredTools(Request $request ,ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $toolService->getStarredTools()]);
    }

    public function getTrashedTools(Request $request ,ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $toolService->getTrashedTools()]);
    }
    
    public function updateTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->updateTools($request)]);
    }

    public function addBrokenTool(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->addBrokenTool($request)]);
    }
    
    public function deleteTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->deleteTools($request)]);
    }

    public function restoreTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->restoreTools($request)]);
    }

    public function permanentDeleteTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->permanentDeleteTools($request)]);
    }
    
    public function starredTools(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->starredTools($request)]);
    }

    public function headDashboardGetTools(ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->headDashboardGetTools()]);
    }

    public function getBrokenTools(ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->getBrokenTools()]);
    }

    public function getSellersList(ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $toolService->getSellersList()]);
    }

    public function addSeller(Request $request, ToolService $toolService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\Procurement\ToolEvent('created'));
        return response()->json(['data' => $toolService->addSeller($request)]);
    }

    public function getToolDashboardData(Request $request, ToolService $toolService){
        // $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\Procurement\ToolEvent('created'));
        return response()->json(['data' => $toolService->getToolDashboardData($request)]);
    }

    public function getToolDashboardDataToFinancial(Request $request, ToolService $toolService){
        // $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\Procurement\ToolEvent('created'));
        return response()->json(['data' => $toolService->getToolDashboardDataToFinancial($request)]);
    }

    public function getToolsForInternalAuditor(Request $request, ToolService $toolService){
        // $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\Procurement\ToolEvent('created'));
        return response()->json(['data' => $toolService->getToolsForInternalAuditor($request)]);
    }
    
}