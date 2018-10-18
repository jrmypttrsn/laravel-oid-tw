<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Operation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function getOperations()
    {
        // $query = Customer::select('first_name', 'last_name', 'email');
        $query = Operation::select('operation_id', 'operation_name', 'certifier_name', 'other_operation_names', 'certification_status', 'certification_status_effective_on', 'contact_first_name', 'contact_last_name', 'physical_city', 'physical_state', 'physical_country','crops_products', 'crops_additional_products', 'livestock_products', 'livestock_additional_products', 'wild_crops_products', 'wild_crops_additional_products', 'handling_products', 'handling_additional_products');
        return datatables($query)
            ->editColumn('operation_name', function ($operation) {
                return '<a href="' . route('operations.show', $operation->operation_id) . '">' . $operation->operation_name . '</a>';
            })
            ->addColumn('contact_name', function ($operation) {
                return $operation->contact_first_name . ' ' . $operation->contact_last_name;
            })
            ->editColumn('certification_status', function ($operation) {
                return $operation->certification_status . '<br><small>Effective: ' . \Carbon\Carbon::parse($operation->certification_status_effective_on)->format('Y-m-d') . '</small>';
            })
            ->editColumn('products', function ($operation) {
                return $operation->crops_products . '' . $operation->crops_additional_products . '' . $operation->livestock_products . '' . $operation->livestock_additional_products . '' . $operation->wild_crops_products . '' . $operation->wild_crops_additional_products . '' . $operation->handling_products . '' . $operation->handling_additional_products; 
            })
            ->rawColumns(['operation_name', 'certification_status', 'products'])
        ->make(true);
    }

}
