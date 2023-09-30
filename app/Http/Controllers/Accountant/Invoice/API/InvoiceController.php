<?php

namespace App\Http\Controllers\Accountant\Invoice\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountantServices\InvoiceServices\API\InvoiceService;

class InvoiceController extends Controller
{
    //
    public function getInvoices(InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoices()]);
    }

    public function getInvoicesCreation(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoicesCreation($request)]);
    }

    public function getInvoiceCreation(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoiceCreation($request)]);
    }
    
    public function getInvoicesCreationAll(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoicesCreationAll($request)]);
    }
    
    public function deleteCreateInvoice(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->deleteCreateInvoice($request)]);
    }

    public function getTrashedCreateInvoice(Request $request,InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getTrashedCreateInvoice($request)]);
    }

    public function restoreCreateInvoice(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->restoreCreateInvoice($request)]);
    }

    public function getInvoiceView(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getInvoiceView($request)]);
    }

    // public function acceptInvoice(Request $request, InvoiceService $invoiceService){
    //     // $this->authorize('authorizeAccountant', \App\Models\User::class); 
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->acceptInvoice($request)]);
    // }

    public function acceptedInvoice(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->acceptedInvoice($request)]);
    }
    
    public function rejectedInvoice(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->rejectedInvoice($request)]);
    }

    public function getTrashedInvoices(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getTrashedInvoices($request)]);
    }

    public function getStarredInvoices(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getStarredInvoices($request)]);
    }
    
    // public function updateInvoice(Request $request, InvoiceService $invoiceService){
    //     $this->authorize('authorizeProcurement', \App\Models\User::class);
    //     event(new \App\Events\NewPostPublished('created'));
    //     return response()->json(['data' => $invoiceService->updateInvoice($request)]);
    // }

    public function deleteInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->deleteInvoice($request)]);
    }

    public function restoreInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->restoreInvoice($request)]);
    }

    public function permanentDeleteInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->permanentDeleteInvoice($request)]);
    }
    
    public function starredInvoice(Request $request, InvoiceService $invoiceService){
        $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->starredInvoice($request)]);
    }

    public function getLegerEntries(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class);
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->getLegerEntries($request)]);
    }

    public function verifyInvoiceCreation(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->verifyInvoiceCreation($request)]);
    }

    public function verifyInvoiceCreationBishop(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->verifyInvoiceCreationBishop($request)]);
    }

    public function verifyInvoiceBishop(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->verifyInvoiceBishop($request)]);
    }
    
    public function getStudentPayments(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->getStudentPayments($request)]);
    }

    public function getStudentClasses(Request $request, InvoiceService $invoiceService){
        // $this->authorize('authorizeHead', \App\Models\User::class); 
        // event(new \App\Events\NewPostPublished('created'));
        return response()->json(['data' => $invoiceService->getStudentClasses($request)]);
    }

    public function getSpecificStudent(Request $request ,InvoiceService $invoiceService){
        // $this->authorize('authorizeAccountant', \App\Models\User::class); 
        return response()->json(['data' => $invoiceService->getSpecificStudent($request)]);
    }
}
