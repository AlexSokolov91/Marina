@extends('admin.layouts.app')

@section('content')

    <!-- Page Content Container -->
    {{--<div class="m-portlet m-portlet--mobile">--}}

    @yield('portlet-content')


    {{--</div>--}}
    <!-- / Page Content Container -->

    <style>
        .dataTables_wrapper .table.dataTable thead .sorting_desc, .dataTables_wrapper .table.dataTable thead .sorting_asc, .dataTables_wrapper .table.dataTable thead .sorting {
            padding-right: 10px !important;
            padding-left: 30px !important;
        }

        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            left: 0.5em !important;
            right: initial !important;
        }
    </style>

@endsection
