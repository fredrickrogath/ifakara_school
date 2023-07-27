<?php

namespace App\Http\Controllers\Head\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\HeadServices\InvoiceServices\InvoiceService;

class InvoiceController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    public function getInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoices()]);
    }

    public function getInvoicesCreation(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoicesCreation()]);
    }

    public function headDashboardGetInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->headDashboardGetInvoices()]);
    }
    
    public function getInvoiceView(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoiceView($request)]);
    }

    public function acceptInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->acceptInvoice($request)]);
    }

    public function acceptedInvoice(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->acceptedInvoice()]);
    }
    
    public function rejectedInvoice(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->rejectedInvoice()]);
    }

    public function getTrashedInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getTrashedInvoices()]);
    }

    public function getTrashedCreateInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getTrashedCreateInvoice($request)]);
    }

    public function deleteCreateInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class);
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->deleteCreateInvoice($request)]);
    }

    public function getStarredInvoices(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getStarredInvoices()]);
    }

    public function verifyInvoiceCreation(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->verifyInvoiceCreation($request)]);
    }
    
    // public function updateInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->updateInvoice($request)]);
    // }

    // public function deleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeHead', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->deleteInvoice($request)]);
    // }

    // public function restoreInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeHead', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->restoreInvoice($request)]);
    // }

    // public function permanentDeleteInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeHead', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->permanentDeleteInvoice($request)]);
    // }
    
    // public function starredInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeHead', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->starredInvoice($request)]);
    // }















    public function getSpecificLegerEntries(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class);
        return response()->json(['data' => $invoiceService->getSpecificLegerEntries()]);
    }

    public function getLegerEntries(InvoiceService $invoiceService){
        $this->authorize('authorizeHead', \App\Models\User::class);
        return response()->json(['data' => $invoiceService->getLegerEntries()]);
    }

    // public function searchStudent(StudentService $studentService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     return response()->json(['data' => $studentService->searchStudent()]);
    // }

    // public function submitTuitionFee(Request $request){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json('success');
    // }

    // public function getChartOfAccounts(ChatOfAccountService $chatOfAccountService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     return response()->json(['data' => $chatOfAccountService->getChartOfAccounts()]);
    // }

    // public function addChartOfAccounts(Request $request, ChatOfAccountService $chatOfAccountService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $chatOfAccountService->addChartOfAccounts($request)]);
    // }

    // public function updateChartOfAccount(Request $request, ChatOfAccountService $chatOfAccountService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $chatOfAccountService->updateChartOfAccount($request)]);
    // }

    // public function deleteChartOfAccounts(Request $request, ChatOfAccountService $chatOfAccountService){
    //     $this->authorize('authorizeAccountant', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $chatOfAccountService->deleteChartOfAccounts($request)]);
    // }
}
