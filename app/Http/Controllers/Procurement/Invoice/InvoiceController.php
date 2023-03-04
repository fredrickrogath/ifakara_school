<?php

namespace App\Http\Controllers\Procurement\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProcurementServices\InvoiceServices\InvoiceService;

class InvoiceController extends Controller
{
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
        return response()->json(['data' => $invoiceService->submitInvoice($request)]);
    }
}
