<?php

namespace App\Http\Controllers\Head\Tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\HeadServices\ToolServices\ToolService;

class ToolController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    // public function add_tool(Request $request ,ToolService $toolService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $toolService->add_tool($request)]);
    // }

    public function get_tools(Request $request ,ToolService $toolService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $toolService->get_tools()]);
    }

    public function headDashboardGetTools(ToolService $toolService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $toolService->headDashboardGetTools()]);
    }
    
    public function getStarredTools(Request $request ,ToolService $toolService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $toolService->getStarredTools()]);
    }

    public function getTrashedTools(Request $request ,ToolService $toolService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $toolService->getTrashedTools()]);
    }

    public function getSellersList(ToolService $toolService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $toolService->getSellersList()]);
    }
    
    // public function updateTools(Request $request, ToolService $toolService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $toolService->updateTools($request)]);
    // }

    // public function deleteTools(Request $request, ToolService $toolService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $toolService->deleteTools($request)]);
    // }

    // public function restoreTools(Request $request, ToolService $toolService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $toolService->restoreTools($request)]);
    // }

    // public function permanentDeleteTools(Request $request, ToolService $toolService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $toolService->permanentDeleteTools($request)]);
    // }
    
    // public function starredTools(Request $request, ToolService $toolService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $toolService->starredTools($request)]);
    // }
}
