@extends('layouts.app')

@section('title', 'Homepage | Sistem Informasi Akuntansi')

@section('content')
    <!-- Hero Section -->
    <div class="text-center p-5" style="background-color: #f8f9fa;">
        <h1 class="display-4" style="color: #333;">Selamat Datang di SIA (Sistem Informasi Akuntansi)</h1>
        <p class="lead" style="color: #555;">Kelola Keuangan Anda dengan Mudah dan Efisien</p>
        <img src="{{ asset('/assets/images/hero-image-removebg-preview.png') }}" alt="Hero Image" class="img-fluid my-4">
        <br>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button"
            style="background-color: #007bff; border-color: #007bff; color: #fff;">Mulai Sekarang</a>
    </div>

    <!-- Features Section -->
    <div class="text-center p-5" style="background-color: #e9ecef;">
        <h2 class="mb-4" style="color: #333;">Modul Aplikasi</h2>
        <div class="row">
            @foreach ([['Akun', 'Kelola akun-akun dalam akuntansi Anda dengan detail dan terstruktur.', 'bi-bookmark'], ['Pencatatan Transaksi', 'Catat semua transaksi keuangan Anda dengan mudah dan cepat.', 'bi-journal-text'], ['Jurnal Umum dan Khusus', 'Kelola jurnal umum dan jurnal khusus Anda dengan sistematis dan efisien.', 'bi-journal-check'], ['Buku Besar', 'Lihat dan kelola buku besar Anda untuk memantau saldo setiap akun.', 'bi-book'], ['Neraca Lajur', 'Lihat dan kelola neraca lajur Anda untuk memastikan kesesuaian antara laporan keuangan.', 'bi-bar-chart'], ['Penyesuaian', 'Lakukan penyesuaian keuangan Anda untuk memastikan data akurat dan terkini.', 'bi-pencil-square'], ['Laporan Keuangan', 'Buat dan lihat laporan keuangan untuk analisis dan pelaporan.', 'bi-file-earmark-text'], ['Penutupan Buku', 'Lakukan penutupan buku keuangan pada akhir periode akuntansi.', 'bi-journal-richtext'], ['Entri Pembalikan', 'Kelola entri pembalikan keuangan Anda untuk mengoreksi kesalahan sebelumnya.', 'bi-arrow-repeat']] as $module)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="background-color: #fff;">
                        <div class="card-body text-center">
                            <i class="bi {{ $module[2] }} display-4 mb-3" style="color: #007bff;"></i>
                            <h5 class="card-title" style="color: #333;">{{ $module[0] }}</h5>
                            <p class="card-text" style="color: #555;">{{ $module[1] }}</p>
                            <a href="{{ route('login') }}" class="btn btn-primary"
                                style="background-color: #007bff; border-color: #007bff; color: #fff;">Masuk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="text-center p-5" style="background-color: #f8f9fa;">
        <h2 class="mb-4" style="color: #333;">Apa Kata Mereka?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm mb-4" style="background-color: #e9ecef;">
                    <div class="card-body">
                        <p class="card-text" style="color: #555;">"SIA membantu kami mengelola keuangan dengan sangat
                            efisien dan mudah. Luar biasa!"</p>
                        <p class="text-end" style="color: #333;"><strong>- John Doe, CEO ABC Corp</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4" style="background-color: #e9ecef;">
                    <div class="card-body">
                        <p class="card-text" style="color: #555;">"Dengan SIA, semua transaksi tercatat dengan baik dan
                            laporan keuangan menjadi lebih rapi."</p>
                        <p class="text-end" style="color: #333;"><strong>- Jane Smith, CFO XYZ Ltd</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4" style="background-color: #e9ecef;">
                    <div class="card-body">
                        <p class="card-text" style="color: #555;">"Penggunaan SIA sangat mudah, fitur-fiturnya lengkap dan
                            sangat membantu kami."</p>
                        <p class="text-end" style="color: #333;"><strong>- Michael Brown, Finance Manager DEF Inc</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline Section -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Alur Kerja Aplikasi</h3>
                    <ul class="timeline">
                        <li class="timeline-reverse">
                            <div class="timeline-icon"><i class="bi bi-box-arrow-in-right"></i></div>
                            <div class="timeline-content">
                                <h4>Login</h4>
                                <p>Masuk ke sistem menggunakan akun Anda untuk mengakses semua fitur yang tersedia.</p>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-icon"><i class="bi bi-speedometer2"></i></div>
                            <div class="timeline-content">
                                <h4>Dashboard</h4>
                                <p>Dashboard utama yang menyediakan akses cepat ke semua modul dan fitur.</p>
                            </div>
                        </li>
                        <li class="timeline-reverse">
                            <div class="timeline-icon"><i class="bi bi-bookmark"></i></div>
                            <div class="timeline-content">
                                <h4>Akun</h4>
                                <p>Kelola akun-akun dalam akuntansi Anda dengan detail dan terstruktur</p>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-icon"><i class="bi bi-journal-text"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Pencatatan Transaksi</h4>
                                <p>Catat semua transaksi keuangan Anda dengan mudah dan cepat untuk memudahkan
                                    monitoring.</p>
                            </div>
                        </li>
                        <li class="timeline-reverse">
                            <div class="timeline-icon"><i class="bi bi-journal-check"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Jurnal Umum dan Jurnal Khusus</h4>
                                <p>Kelola jurnal umum dan jurnal khusus Anda dengan sistematis dan efisien.</p>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-icon"><i class="bi bi-book"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Buku Besar</h4>
                                <p>Lihat dan kelola buku besar Anda untuk memantau saldo setiap akun.</p>
                            </div>
                        </li>
                        <li class="timeline-reverse">
                            <div class="timeline-icon"><i class="bi bi-bar-chart"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Neraca Lajur</h4>
                                <p>Lihat dan kelola neraca lajur Anda untuk memastikan kesesuaian antara laporan keuangan.</p>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-icon"><i class="bi bi-pencil-square"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Penyesuaian</h4>
                                <p>Lakukan penyesuaian keuangan Anda untuk memastikan data akurat dan terkini.</p>
                            </div>
                        </li>
                        <li class="timeline-reverse">
                            <div class="timeline-icon"><i class="bi bi-file-earmark-text"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Laporan Keuangan</h4>
                                <p>Buat dan lihat laporan keuangan untuk analisis dan pelaporan.</p>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-icon"><i class="bi bi-journal-richtext"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Penutupan Buku</h4>
                                <p>Lakukan penutupan buku keuangan pada akhir periode akuntansi.</p>
                            </div>
                        </li>
                        <li class="timeline-reverse">
                            <div class="timeline-icon"><i class="bi bi-arrow-repeat"></i></div>
                            <div class="timeline-content">
                                <h4>Modul Entri Pembalikan</h4>
                                <p>Kelola entri pembalikan keuangan Anda untuk mengoreksi kesalahan sebelumnya.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="p-5" style="background-color: #f8f9fa;">
        <h2 class="mb-4 text-center" style="color: #333;">Pertanyaan yang Sering Diajukan</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item" style="background-color: #e9ecef; color: #333;">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                        style="background-color: #e9ecef; color: #333;">
                        Apa itu SIA?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body" style="background-color: #fff; color: #555;">
                        SIA adalah Sistem Informasi Akuntansi yang membantu Anda mengelola keuangan dengan lebih baik.
                    </div>
                </div>
            </div>
            <div class="accordion-item" style="background-color: #e9ecef; color: #333;">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                        style="background-color: #e9ecef; color: #333;">
                        Bagaimana cara menggunakan SIA?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body" style="background-color: #fff; color: #555;">
                        Anda dapat mendaftar dan mengikuti panduan pengguna yang tersedia di dalam sistem untuk memulai.
                    </div>
                </div>
            </div>
            <div class="accordion-item" style="background-color: #e9ecef; color: #333;">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                        style="background-color: #e9ecef; color: #333;">
                        Apakah SIA aman digunakan?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body" style="background-color: #fff; color: #555;">
                        Ya, SIA menggunakan teknologi keamanan terbaru untuk melindungi data Anda.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-body .bi {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .card {
            border-radius: 15px;
            border: none;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }

        .accordion-button:not(.collapsed) {
            color: #333;
            background-color: #e9ecef;
        }

        .accordion-button:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .accordion-item {
            border: none;
            margin-bottom: 1rem;
        }

        .timeline {
            list-style: none;
            padding: 0;
            position: relative;
        }

        .timeline:before {
            content: '';
            background: #dee2e6;
            display: inline-block;
            position: absolute;
            left: 50%;
            width: 4px;
            height: 100%;
            z-index: 0;
        }

        .timeline>li {
            margin: 20px 0;
            position: relative;
        }

        .timeline>li:before,
        .timeline>li:after {
            content: " ";
            display: table;
        }

        .timeline>li:after {
            clear: both;
        }

        .timeline>li:before,
        .timeline>li:after {
            content: " ";
            display: table;
        }

        .timeline-icon {
            color: #fff;
            width: 60px;
            height: 60px;
            line-height: 60px;
            font-size: 1.5em;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -30px;
            margin-left: -30px;
            background-color: #007bff;
            z-index: 2;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .timeline-icon .bi {
            font-size: 1.5em;
            color: #fff !important;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .timeline>li .timeline-content {
            width: 45%;
            float: left;
            position: relative;
            text-align: left;
            padding: 20px;
            border-radius: 2px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .timeline>li.timeline-inverted .timeline-content {
            float: right;
        }

        /* .timeline>li.timeline-reverse .timeline-icon {
            right: auto;
            left: 50%;
        }

        .timeline>li.timeline-inverted .timeline-icon {
            left: auto;
            right: 50%;
        } */

        .timeline>li .timeline-content h4 {
            margin-top: 0;
            color: #343a40;
        }

        .timeline>li .timeline-content p {
            margin-bottom: 0;
        }
    </style>
@endsection
