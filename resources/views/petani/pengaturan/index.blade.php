@extends('petani.template')
@section('title', 'Biodata Petani')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <!-- include summernote css/js -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->
@endsection

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="editPasswordForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="form-group my-2">
                            <label for="password">Password</label>
                            <small class="d-flex text-danger pb-1">*Catatan:
                                <br>1. Jika tidak ingin ubah password biarkan kosong,
                                <br>2. Dan jika ingin ubah password, silahkan masukkan password.
                            </small>
                            <input type="password"  id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" id="password_btn" class="btn btn-primary">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">@yield('title')</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ url('petani/pengaturan') }}">Biodata
                                        Petani</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body row">
                            <div class="col-12 col-md-12 col-lg-5">
                                <div id="profile_alert"></div>
                                <div class="card align-items-center justify-content-center">
                                    <div class="card-body">
                                        <div class="chocolat-parent">
                                            <a href="" class="chocolat-image" title="Just an example">
                                                <div>
                                                    @if ($userInfo->image)
                                                    <img alt="image" id="image_preview"
                                                        src="../storage/profile/{{ $userInfo->image }}"
                                                        class="img-fluid img-thumbnail">
                                                    @else
                                                    <img alt="image" id="image_preview"
                                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}"
                                                        class="img-fluid img-thumbnail">
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        <div class="pt-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*" id="image" name="image">
                                                <label class="custom-file-label" for="image">Ubah Profile</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="{{ $userInfo->id }}">
                            <div class="col-12 col-md-12 col-lg-7">
                                <div class="">
                                    <form method="post" action="#" id="profile_form">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Ubah Biodata Diri</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="name">Nama Petani</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ $userInfo->user->name }}" required="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{ $userInfo->user->email }}" required="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label for="telp">No Handphone</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <span>+62</span>
                                                        </div>
                                                        </div>
                                                        <input type="tel" name="telp" id="telp" value="{{ $userInfo->telp}}" class="form-control phone-number">
                                                    </div>
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5 col-12">
                                                    <label for="city">Kota</label>
                                                    <input type="text" class="form-control" name="city" id="city"
                                                        value="{{ $userInfo->city }}" required="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="address">Alamat</label>
                                                    <input type="text" class="form-control" name="address" id="address"
                                                        value="{{ $userInfo->address }}" required="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer row align-items-center justify-content-end mb-3">
                                            <input type="button" value="Ubah Password"
                                                class="btn btn-light m-1" data-toggle="modal" data-target="#editEmployeeModal">
                                            <input type="submit" id="profile_btn" value="Ubah Biodata Diri"
                                                class="btn btn-primary m-1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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

    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
        $(function() {
            $("#image").change(function(e) {
                const file = e.target.files[0];
                let url = window.URL.createObjectURL(file);
                $("#image_preview").attr('src', url);
                let fd = new FormData();
                fd.append('image', file);
                fd.append('user_id', $("#user_id").val());
                fd.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: '{{ route('petani.pengaturan.image') }}',
                    method: 'POST',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(res){
                        if(res.status == 200) {
                            // $("#profile_alert").html(showMessage('success', res.messages));
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Berhasil',
                                message: res.messages,
                                position: 'topRight'
                            });
                            $("#image").val('');
                        }
                    }
                });
            });

            $("#profile_form").submit(function(e) {
                e.preventDefault();
                let id = $("#user_id").val();
                $("#profile_btn").val('Silahkan tunggu..');
                $("#profile_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('petani.pengaturan.update') }}',
                    method: 'POST',
                    data: $(this).serialize()+ `&id=${id}`,
                    dataType: 'json',
                    success: function(res){
                        if (res.status == 200) {
                            // $("#profile_alert").html(showMessage('success', res.messages));
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Berhasil',
                                message: res.messages,
                                position: 'topRight'
                            });
                            $("#profile_btn").val('Ubah Biodata Diri');
                            $("#profile_btn").prop('disabled', false);
                            window.location.reload();
                        }
                    }
                });
            });

            $("#editPasswordForm").submit(function(e) {
                e.preventDefault();
                let id = $("#user_id").val();
                $("#password_btn").val('Silahkan tunggu..');
                $("#password_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('petani.pengaturan.updatePassword') }}',
                    method: 'POST',
                    data: $(this).serialize()+ `&id=${id}`,
                    dataType: 'json',
                    success: function(res){
                        if (res.status == 200) {
                            // $("#profile_alert").html(showMessage('success', res.messages));
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Berhasil',
                                message: res.messages,
                                position: 'topRight'
                            });
                            $("#profile_btn").val('Ubah Password');
                            $("#profile_btn").prop('disabled', false);
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection
