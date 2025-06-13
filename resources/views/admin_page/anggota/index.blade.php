@extends('layouts.admin_layout')
<?php
$main_data = 'Anggota';
$url = '/admin/anggota';
?>

@section('title', $main_data)
@section('content')
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">
                    {{ $main_data }}
                </h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url($url) }}">
                            {{ $main_data }}
                        </a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title mb-0 fw-bold">Daftar
                                    {{ $main_data }}
                                </h5>
                                <p class="card-text text-muted">Berikut adalah daftar {{ $main_data }} yang terdaftar di
                                    sistem.</p>
                            </div>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-add-line align-bottom me-1"></i> Tambah
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ url($url . '/tambah') }}">Tambah
                                            {{ $main_data }}</a>
                                        <a class="dropdown-item" href="{{ url($url . '/import') }}">Import
                                            {{ $main_data }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter">
                            <form class="d-flex align-items-center mt-3 gap-2">

                                <div>
                                    <input type="text" class="form-control" placeholder="Filter {{ $main_data }}"
                                        aria-label="Filter {{ $main_data }}">
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    Filter
                                </button>
                            </form>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-2 border-b">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">NIP/NIPPPK</th>
                                        <th scope="col">NO HP/WA</th>
                                        <th scope="col">Status Dosen</th>
                                        <th scope="col">Homebase PT</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Status Anggota</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                    </tr>

                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript: void(0);" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript: void(0);">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
