<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    @include('partials.sidebar')

    <div id="content" class="p-4 p-md-5 pt-5">
        @yield('content')
    </div>

</div>



<script src={{ url("js/jquery.min.js") }}></script>
{{-- <script src={{ url("js/popper.js") }}></script> --}}
<script src={{ url("js/bootstrap.min.js") }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src={{ url("js/main.js") }}></script>
{{-- <script src={{ url("js/jquery-ui.js") }}></script> --}}
<script src={{ url("js/Chart.min.js") }}></script>
{{-- <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html>