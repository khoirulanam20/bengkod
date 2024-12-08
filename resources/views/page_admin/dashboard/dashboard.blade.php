@extends('template-admin.layout')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 text-center mb-4">
                    {{-- <img src="{{ asset('env') }}/logoskmku.jpg" width="250" alt="Logo SkripsiKU"
                            class="img-fluid"> --}}
                        <p class="mt-3">
                            Selamat datang di <strong>SkripsiKU</strong>, sistem informasi yang dirancang untuk
                            memudahkan pengelolaan skripsi bagi mahasiswa dan dosen.
                            Platform ini merupakan bagian dari layanan unggulan Universitas Dian Nuswantoro (UDINUS)
                            untuk mendukung proses akademik secara modern dan efisien.
                        </p>
                </div>
            </div>

            <!-- Tambahkan Card Statistik -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Mahasiswa</p>
                                    <h4 class="mb-0">150</h4>
                                </div>
                                <div class="ms-auto font-35 text-primary">
                                    <i class="bx bx-user-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Dosen</p>
                                    <h4 class="mb-0">45</h4>
                                </div>
                                <div class="ms-auto font-35 text-success">
                                    <i class="bx bx-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Skripsi Aktif</p>
                                    <h4 class="mb-0">98</h4>
                                </div>
                                <div class="ms-auto font-35 text-warning">
                                    <i class="bx bx-file"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Skripsi Selesai</p>
                                    <h4 class="mb-0">52</h4>
                                </div>
                                <div class="ms-auto font-35 text-info">
                                    <i class="bx bx-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection