<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ICD | SCHOOL</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- Template --}}

    <!-- Plugins css -->
    <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    
    <!-- App css -->
    <link href="assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script rel="stylesheet" href="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css"> --}}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css">

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.jqueryui.min.js"></script>
    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    

    {{-- <script src="datatable.js"></script> --}}
    
    {{-- End of template --}}


    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        /* .btn:hover {
            color: #fff !important;
            text-decoration: none;
        }

        .btn:focus {
            color: #fff !important;
            text-decoration: none;
        } */

        /* .form-control-light {
            background-color: #fff !important;
            border-color: #f7b84b !important;
        } */

        /* body {
            zoom: 90%;
            transform: scale(0.9);
            transform-origin: 0 0;
        } */

        body {
            /* width: 106%;
            height: 106%; */
            /* zoom: 100%; */
            /* transform: scale(0.95);
            transform-origin: 0 0; */
        }

        .above-all {
            position: absolute;
            z-index: 9990;
        }
    </style>
</head>

<body class="font-sans antialiased loading font-sans text-xs">
    @inertia

    {{-- <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script> --}}

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    {{-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> --}}

    <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- Dashboar 1 init js-->
    {{-- <script src="assets/js/pages/dashboard-1.init.js"></script> --}}

    {{-- Datatables --}}

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>


    <!-- third party js -->
    {{-- <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script> --}}
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    {{-- <script src="assets/js/pages/datatables.init.js"></script> --}}

</body>

</html>
