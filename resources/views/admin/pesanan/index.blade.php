@extends('admin.template')
@section('title', 'Pesanan')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- MULAI STYLE CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
<!-- AKHIR STYLE CSS -->
<style>
    /* STYLE CSS */
    .costum-color {
        background-image: linear-gradient(195deg, #007bff 0%, #007bff 100%);
    }

</style>
@endsection

@section('content')
<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="tabs">
                        <div class="card-body px-0 pb-2">
                            <ul class="mx-3 p-1 nav bg-white rounded nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link listSemua col-12" href="#listSemua">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link listDikemas col-12" href="#listDikemas">Dikemas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link listDikirim col-12" href="#listDikirim">Dikirim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link listSelesai col-12" href="#listSelesai">Selesai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link listDibatalkan col-12" href="#listDibatalkan">Dibatalkan</a>
                                </li>
                            </ul>
                            <div class="mt-4 table-responsive" id="listSemua">
                                {{-- Table --}}
                                <h5 class="text-center text-secondary my-5">Memuat..</h5>
                            </div>
                            <div class="mt-4 table-responsive" id="listDikemas">
                                {{-- Table --}}
                                <h5 class="text-center text-secondary my-5">Memuat..</h5>
                            </div>
                            <div class="mt-4 table-responsive" id="listDikirim">
                                {{-- Table --}}
                                <h5 class="text-center text-secondary my-5">Memuat..</h5>
                            </div>
                            <div class="mt-4 table-responsive" id="listSelesai">
                                {{-- Table --}}
                                <h5 class="text-center text-secondary my-5">Memuat..</h5>
                            </div>
                            <div class="mt-4 table-responsive" id="listDibatalkan">
                                {{-- Table --}}
                                <h5 class="text-center text-secondary my-5">Memuat..</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<!-- LIBARARY JS -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
    integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
    integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<!-- AKHIR LIBARARY JS -->

<!-- JAVASCRIPT -->
<script>
    $(function () {
        $("#tabs").tabs();
        $( ".listSemua" ).tabs({
            classes: {
                "ui-tabs": "costum-color"
            }
        });
        $(".listDikemas").tabs({
            classes: {
                "ui-tabs": "costum-color"
            }
        });
        $(".listDikirim").tabs({
            classes: {
                "ui-tabs": "costum-color"
            }
        });
        $(".listSelesai").tabs({
            classes: {
                "ui-tabs": "costum-color"
            }
        });
        $( ".listDibatalkan" ).tabs({
            classes: {
                "ui-tabs": "costum-color"
            }
        });
    });

    //CSRF TOKEN PADA HEADER
    //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(function () {

        // fetch all employees ajax request
        fetchAllEmployees();
        fetchDikemasEmployees();
        fetchDikirimEmployees();
        fetchSelesaiEmployees();
        fetchDibatalkanEmployees();

        function fetchAllEmployees() {
            $.ajax({
            url: '{{ route('admin.orders.fetchAll') }}',
            method: 'get',
            success: function(response) {
                $("#listSemua").html(response);
                $("#listTableSemua").DataTable({
                    order: [0, 'asc'],
                });
            }
            });
        }

        function fetchDikemasEmployees() {
            $.ajax({
                url: '{{ route('admin.orders.fetchDikemas') }}',
                method: 'get',
                success: function (response) {
                    $("#listDikemas").html(response);
                    $("#tableDikemas").DataTable({
                        order: [0, 'asc']
                    });
                }
            });
        }

        function fetchDikirimEmployees() {
            $.ajax({
                url: '{{ route('admin.orders.fetchDikirim') }}',
                method: 'get',
                success: function (response) {
                    $("#listDikirim").html(response);
                    $("#tableDikirim").DataTable({
                        order: [0, 'asc']
                    });
                }
            });
        }

        function fetchSelesaiEmployees() {
            $.ajax({
                url: '{{ route('admin.orders.fetchSelesai') }}',
                method: 'get',
                success: function (response) {
                    $("#listSelesai").html(response);
                    $("#tableSelesai").DataTable({
                        order: [0, 'asc']
                    });
                }
            });
        }

        function fetchDibatalkanEmployees() {
            $.ajax({
            url: '{{ route('admin.orders.fetchDibatalkan') }}',
            method: 'get',
            success: function(response) {
                $("#listDibatalkan").html(response);
                $("#listTableDibatalkan").DataTable({
                    order: [0, 'asc'],
                });
            }
            });
        }
    });

</script>
@endsection
