@extends('admin.template')
@section('title', 'Produk')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->
    <style>
        @media (max-width: 1267px) {
            .desc {
                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
                height: 90px;
            }
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
                        <div class="card-header">
                            <button type="submit" class="btn btn-primary"  data-toggle="modal"
                                    data-target="#addEmployeeModal">Tambah @yield('title')</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="show_all_employees">
                                <h1 class="text-center text-secondary my-5">Memuat..</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <label for="name">Pilih Gapoktan</label>
                        <select class="form-control select2" name="gapoktan_id" required>
                            <option selected disabled>Pilih Gapoktan</option>
                            @foreach ($user as $item)
                                @if ( old('gapoktan_id') == $item->id )
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="form-group my-2">
                            <label for="name">Nama Produk</label>
                            <input type="text" name="name" class="nameCheck form-control" placeholder="Nama Produk" required>
                        </div>
                        <div class="form-group my-2">
                            <label>Kategori Produk</label>
                            <select class="form-control select2" name="category_product_id" required>
                                <option selected value="" disabled>Pilih Kategori</option>
                                @foreach ($category as $item)
                                    @if ( old('category_product_id') == $item->id )
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-lg-flex justify-content-between my-2 form-group">
                            <div>
                                <label for="stoke" style="font-size: 12px">Stok</label>
                                <input type="text" name="stoke" class="form-control" placeholder="Stok" required>
                            </div>
                            <div class="pt-2 pt-lg-0">
                                <label for="price" style="font-size: 12px">Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="Harga" required>
                            </div>
                        </div>
                        <div class="my-2 form-group">
                            <label for="desc">Deskripsi</label>
                            <textarea class="form-control" name="desc" rows="3" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="my-2 form-group">
                            <label for="image">Unggah Foto</label>
                            <small class="d-flex text-danger">*Unggah berupa foto produk</small>
                            <div>
                                <div class="tab-content my-2" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <img id="preview" class="img-fluid img-thumbnail image"
                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}" alt="edukasi"
                                        style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="image" id="files" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" id="add_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id">
                    <input type="hidden" name="emp_avatar" id="emp_avatar">
                    <div class="modal-body p-4">
                        <div class="form-group mb-5">
                            <label for="name">Ubah Gapoktan</label>
                            <small class="d-flex text-danger pb-1">*Catatan:
                                <br>1. Jika tidak ingin ubah Gapoktan biarkan kosong,
                                <br>2. Dan jika ingin ubah Gapoktan, silahkan pilih Gapoktan.
                            </small>
                            <select class="form-control select2" name="gapoktan_id" required>
                                <option selected disabled>Pilih Gapoktan</option>
                                @foreach ($user as $item)
                                    @if ( old('gapoktan_id') == $item->id )
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="name">Nama Gapoktan</label>
                            <input type="text" disabled id="gapoktan_id" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="nameCheck form-control" placeholder="Nama" required>
                        </div>
                        <div class="form-group my-2">
                            <label>Kategori Produk</label>
                            <select class="form-control select2" id="category_product_id" name="category_product_id">
                                <option selected disabled>Pilih Kategori</option>
                                @foreach ($category as $item)
                                    @if ( old('category_product_id') == $item->id )
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-lg-flex justify-content-between my-2 form-group">
                            <div>
                                <label for="stoke" style="font-size: 12px">Stok</label>
                                <input type="text" name="stoke" id="stoke" class="form-control" placeholder="Stok" required>
                            </div>
                            <div class="pt-2 pt-lg-0">
                                <label for="price" style="font-size: 12px">Harga</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Harga" required>
                            </div>
                        </div>
                        <div class="my-2 form-group">
                            <label for="desc">Deskripsi</label>
                            <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="my-2 form-group">
                            <label for="file">Unggah File</label>
                            <small class="d-flex text-danger pb-1">*Unggah berupa foto produk</small>
                            <div class="my-2">
                                <div class="editFile">

                                </div>
                            </div>
                            <input type="file" name="image" id="files" accept="image/*" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- LIBARARY JS -->
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script> --}}
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
        $('.nameCheck').change(function(e) {
            $.get('{{ route('admin-produk-checkSlug') }}',
            { 'name': $(this).val() },
                function( data ) {
                    $('.slugCheck').val(data.slug);
                }
            );
        });

        $(function() {
            $('#files').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewer.load;
                reader.readAsDataURL(file);
            });

            var viewer = {
                load : function(e) {
                    $('#preview').attr('src', e.target.result)
                    $('#videoPreview').attr('src', e.target.result)
                }
            }
        })

        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(function() {

            // add new employee ajax request
            $("#add_employee_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_employee_btn").text('Tunggu..');
                $("#add_employee_btn").prop('disabled', true);
                $.ajax({
                url: '{{ route('admin-produk-store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                    Swal.fire(
                        'Menambahkan!',
                        'Produk Berhasil Ditambahkan!',
                        'success'
                    )
                    fetchAllEmployees();
                    }
                    $("#add_employee_btn").text('Simpan');
                    $("#add_employee_btn").prop('disabled', false);
                    $("#add_employee_form")[0].reset();
                    $("#addEmployeeModal").modal('hide');
                }
                });
            });

            // edit employee ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                url: '{{ route('admin-produk-edit') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#name").val(response.name);
                    $("#gapoktan_id").val(response.user.name);
                    $("#category_product_id").val(response.category_product_id);
                    $("#stoke").val(response.stoke);
                    $("#price").val(response.price);
                    $("#desc").val(response.desc);
                    if (response.image) {
                        $(".editFile").html(
                            `<div class="tab-pane fade show active" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <img id="preview" class="img-fluid img-thumbnail image"
                                src="../storage/produk/${response.image}" alt="produk"
                                style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                            </div>`);
                    }
                    $("#emp_id").val(response.id);
                    $("#emp_avatar").val(response.image);
                }
                });
            });

            // update employee ajax request
            $("#edit_employee_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_employee_btn").text('Tunggu..');
                $("#edit_employee_btn").prop('disabled', true);
                $.ajax({
                url: '{{ route('admin-produk-update') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                    Swal.fire(
                        'Memperbarui!',
                        'Produk Berhasil Diperbarui!',
                        'success'
                    )
                    fetchAllEmployees();
                    }
                    $("#edit_employee_btn").text('Simpan');
                    $("#edit_employee_btn").prop('disabled', false);
                    $("#edit_employee_form")[0].reset();
                    $("#editEmployeeModal").modal('hide');
                }
                });
            });

            // delete employee ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Cancel!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '{{ route('admin-produk-delete') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                        'Dihapus!',
                        'File Anda telah dihapus.',
                        'success'
                        )
                        fetchAllEmployees();
                    }
                    });
                }
                })
            });

            // fetch all employees ajax request
            fetchAllEmployees();

            function fetchAllEmployees() {
                $.ajax({
                url: '{{ route('admin-produk-fetchAll') }}',
                method: 'get',
                success: function(response) {
                    $("#show_all_employees").html(response);
                    $("table").DataTable({
                        order: [0, 'asc']
                    });
                }
                });
            }
        });

    </script>
@endsection