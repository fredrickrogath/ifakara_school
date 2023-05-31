<?php

namespace App\Http\Controllers\Procurement\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProcurementServices\InvoiceServices\InvoiceService;

class InvoiceController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    public function addInvoice(Request $request ,InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->addInvoice($request)]);
    }

    public function getInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoices()]);
    }

    public function getInvoiceView(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoiceView($request)]);
    }
    
    public function getTrashedInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getTrashedInvoices()]);
    }

    public function getStarredInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getStarredInvoices()]);
    }
    
    public function updateInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->updateInvoice($request)]);
    }

    public function deleteInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->deleteInvoice($request)]);
    }

    public function restoreInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->restoreInvoice($request)]);
    }

    public function permanentDeleteInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->permanentDeleteInvoice($request)]);
    }
    
    public function starredInvoices(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->starredInvoices($request)]);
    }
    
    public function getTools(InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getTools()]);
    }

    public function getSellers(InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getSellers()]);
    }

    public function submitInvoice(Request $request ,InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->submitInvoice($request)]);
    }

    public function starredInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->starredInvoice($request)]);
    }

    public function headDashboardGetInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->headDashboardGetInvoices()]);
    }

    public function getInvoiceDashboardData(Request $request ,InvoiceService $invoiceService){
        // $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->getInvoiceDashboardData($request)]);
    }

    public function getInvoiceDashboardDataToFinancial(Request $request ,InvoiceService $invoiceService){
        // $this->authorize('authorizeProcurement', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->getInvoiceDashboardDataToFinancial($request)]);
    }
}
