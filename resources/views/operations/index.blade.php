@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
@endsection

@section('body')
<div class="container mx-auto py-4">

    <div class="bg-blue-lightest border-t-4 border-blue rounded-b text-blue-darkest mb-4 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-blue mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
                <p class="font-bold">The data is downloaded from the <a href="https://organic.ams.usda.gov/Integrity/">USDA Organic Integrity Database</a></p>
                <p class="text-sm">The most recent update of the data on the USDA site occurred on {{ Carbon\Carbon::parse($lastdate->date_as_of)->format('Y-m-d') }}</p>
            </div>
        </div>
    </div>
    <div class="w-full rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Operations</div>
            <table class="table-auto border-collapse" id="datatable">
                <thead>
                <tr>
                    <th>Operation Name</th>
                    <th>Certifier Name</th>
                    <th>Former Operation Names</th>
                    <th>Certification Status</th>
                    <th>Contact Name</th>
                    <th>Contact First Name</th>
                    <th>Contact Last Name</th>
                    <th>City</th>
                    <th>State/Province</th>
                    <th>Country</th>
                    <th>Products</th>
                    <th>Products</th>
                    <th>Products</th>
                    <th>Products</th>
                    <th>Products</th>
                    <th>Products</th>
                    <th>Products</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.19/dataRender/ellipsis.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.operations.index') }}",
                "columns": [
                    { "data": "operation_name" },
                    { "data": "certifier_name" },
                    { "data": "other_operation_names" },
                    { "data": "certification_status" },
                    { "data": "contact_name", "name": "contact_name", "searchable": false, "visible": true  },
                    { "data": "contact_first_name", "searchable": true, "visible": false },
                    { "data": "contact_last_name", "searchable": true, "visible": false },
                    { "data": "physical_city" },
                    { "data": "physical_state" },
                    { "data": "physical_country" },
                    { "data": "products", "name": "products", "searchable": false, "visible": true },
                    { "data": "crops_products", "searchable": true, "visible": false },
                    { "data": "crops_additional_products", "searchable": true, "visible": false },
                    { "data": "livestock_products", "searchable": true, "visible": false },
                    { "data": "livestock_additional_products", "searchable": true, "visible": false },
                    { "data": "wild_crops_products", "searchable": true, "visible": false },
                    { "data": "wild_crops_additional_products", "searchable": true, "visible": false },
                    { "data": "handling_products", "searchable": true, "visible": false },
                    { "data": "handling_additional_products", "searchable": true, "visible": false }
                ],
                "pageLength": 15,
                "lengthMenu": [ [15, 25, 50], [15, 25, 50] ],
                "language": {
                    "processing": "Loading. Please wait..."
                },
                "columnDefs": [{
                    "targets": 10,
                    "render": function (data, type, row) {
                        return type === "display" && data.length > 50 ?
                            data.substr(0, 50) +'...' : data;
                    },
                }],
                "responsive": true,
            });
        });

    </script>
@endsection
