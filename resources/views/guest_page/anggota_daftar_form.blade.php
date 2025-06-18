<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8" />
    <title>
        {{ config('app.name', 'Laravel') }} - Admin Template
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{-- Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @notifyCss

    <style>
        body {
            background-color: #a02929 !important;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .card.pendaftaran {
            margin: 20px auto;
            max-width: 700px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card .card-title-desc {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 20px;
        }


        /* Responsive */
        @media (max-width: 576px) {
            .card.pendaftaran {
                margin: 10px;
                padding: 15px;
            }

            .card .card-title {
                font-size: 1rem;
                font-weight: 600;
                margin-bottom: 10px;
            }

            .card .card-title-desc {
                font-size: 0.7rem;
                color: #6c757d;
                margin-bottom: 15px;
            }
        }
    </style>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets-template/images/favicon.ico">

    <!-- App css -->
    <link href="{{ url('/') }}/assets-template/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    {{-- Custom CSS --}}
    <link href="{{ url('/') }}/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- Icons -->
    <link href="{{ url('/') }}/assets-template/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="{{ url('/') }}/assets-template/js/head.js"></script>


</head>

<!-- body start -->

<body data-menu-color="light">

    <!-- Begin page -->
    <div>

        <!-- Topbar Start -->
        {{-- <div class="topbar-custom" style="left: 0; right: 0; top: 0; z-index: 1030;">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    Daftar Anggota
                </div>
            </div>
        </div> --}}
        <!-- end Topbar -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page" style="margin: 0">
            <div class="content">
                <div class="card pendaftaran">
                    <div class="card-body">
                        <div>
                            <div class="">
                                <img src="{{ url('/') }}/assets/images/logo.png" alt="Logo"
                                    class="img-fluid mb-3" style="max-width: 150px; display: block; margin: 0 auto;">

                            </div>
                            <h4 class="card-title text-center">Form Pendataan Anggota Tetap Adaksi Dan Pendataan
                                Pembelian
                                Merchandise
                            </h4>
                            <p class="card-title-desc text-center">Form ini adalah pendataan resmi untuk bapak/ibu dosen
                                ASN
                                dan DPK di
                                PTS Kemdiktisaintek yang ingin menjadi anggota tetap ADAKSI. Form ini sekaligus sebagai
                                sumber data untuk pencetakan KTA baik cetak maupun digital.</p>
                        </div>

                        <form action="{{ url('anggota/daftar') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Nama Lengkap --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label m-0">Nama Lengkap</label>
                                <p class="text-muted mb-1" style="font-size: 0.775rem;">Nama Lengkap dengan gelar.
                                    Pastika
                                    tidak ada kesalahan untuk di cetak di KTA</p>
                                <input type="text" class="form-control" id="nama" name="nama_anggota"
                                    placeholder="Masukkan nama lengkap Anda">
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label m-0">Email</label>
                                <p class="text-muted mb-1" style="font-size: 0.775rem;">Email yang valid untuk
                                    pengiriman KTA digital</p>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan email Anda">
                            </div>

                            <div class="row">
                                {{-- NIP/NIPPPK --}}
                                <div class="mb-3 col-md-6">
                                    <label for="nip_nippk" class="form-label mb-1">NIP/NIPPPK</label>
                                    <input type="tel" class="form-control" id="nip_nippk" name="nip_nipppk"
                                        placeholder="Masukkan NIP/NIPPPK Anda">
                                </div>

                                {{-- Nomor HP / WA --}}
                                <div class="mb-3 col-md-6">
                                    <label for="no_hp" class="form-label mb-1">Nomor HP / WA</label>
                                    <input type="tel" class="form-control" id="no_hp" name="no_hp"
                                        placeholder="Masukkan nomor HP/WA Anda">
                                </div>
                            </div>

                            <div class="row">
                                {{-- Status Dosen --}}
                                <div class="mb-3 col-md-6">
                                    <label for="status_dosen" class="form-label mb-1">Status Dosen</label>
                                    <select class="form-select" id="status_dosen" name="status_dosen">
                                        <option value="" disabled selected>Pilih status dosen Anda</option>
                                        <option value="ASN">ASN</option>
                                        <option value="DPK">DPK</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                {{-- Homebase PT --}}
                                <div class="mb-3 col-md-6">
                                    <label for="homebase_pt" class="form-label mb-1">Homebase PT</label>
                                    <input type="text" class="form-control" id="homebase_pt" name="homebase_pt"
                                        placeholder="Masukkan nama PT Anda">
                                </div>
                            </div>

                            {{-- Provinsi --}}
                            <div class="mb-3">
                                <label for="provinsi" class="form-label mb-1">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi"
                                    placeholder="Masukkan provinsi Anda">
                            </div>

                            {{-- Bukti Transfer --}}
                            <div class="mb-3">
                                <label for="bukti_transfer" class="form-label mb-1">Bukti Transfer</label>
                                <input type="file" class="form-control" id="bukti_transfer"
                                    name="bukti_transfer">
                            </div>

                            <button type="submit" class="btn btn-dark w-100">Daftar Anggota</button>
                            <a href="{{ url('/') }}" class="btn btn-light w-100 mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <footer class="footer" style="left: 0; right: 0;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy; Copyright
                            <script>
                                document.write(new Date().getFullYear())
                            </script> by <a class="text-reset fw-semibold">
                                {{ config('app.name') ?? 'Your Company Name' }}
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ url('/') }}/assets-template/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets-template/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets-template/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('/') }}/assets-template/libs/node-waves/waves.min.js"></script>
    <script src="{{ url('/') }}/assets-template/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ url('/') }}/assets-template/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ url('/') }}/assets-template/libs/feather-icons/feather.min.js"></script>

    <!-- Apexcharts JS -->
    <script src="{{ url('/') }}/assets-template/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Widgets Init Js -->
    <script src="{{ url('/') }}/assets-template/js/pages/crm-dashboard.init.js"></script>

    <!-- App js-->
    <script src="{{ url('/') }}/assets-template/js/app.js"></script>

    <x-notify::notify />
    @notifyJs
</body>

</html>
