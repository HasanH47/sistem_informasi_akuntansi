@extends('layouts.app')

@section('title', 'Homepage | Sistem Informasi Akuntansi')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4">Selamat Datang di Sistem Informasi Akuntansi</h1>
            <p class="lead">Kelola Keuangan Anda dengan Mudah dan Efisien</p>
            <hr class="my-4">
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Flow Aplikasi</h3>
                        <ul class="timeline">
                            <li>
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
                            <li>
                                <div class="timeline-icon"><i class="bi bi-journal-text"></i></div>
                                <div class="timeline-content">
                                    <h4>Modul Pencatatan Transaksi</h4>
                                    <p>Catat semua transaksi keuangan Anda dengan mudah dan cepat untuk memudahkan
                                        monitoring.</p>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-icon"><i class="bi bi-journal-check"></i></div>
                                <div class="timeline-content">
                                    <h4>Modul Jurnal Umum dan Jurnal Khusus</h4>
                                    <p>Kelola jurnal umum dan jurnal khusus Anda dengan sistematis dan efisien.</p>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-icon"><i class="bi bi-book"></i></div>
                                <div class="timeline-content">
                                    <h4>Modul Buku Besar</h4>
                                    <p>Lihat dan kelola buku besar Anda untuk memantau saldo setiap akun.</p>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-icon"><i class="bi bi-bar-chart"></i></div>
                                <div class="timeline-content">
                                    <h4>Modul Neraca Saldo</h4>
                                    <p>Lihat dan kelola neraca saldo Anda untuk memastikan semua akun seimbang.</p>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-icon"><i class="bi bi-pencil-square"></i></div>
                                <div class="timeline-content">
                                    <h4>Modul Penyesuaian</h4>
                                    <p>Lakukan penyesuaian keuangan Anda untuk memastikan data akurat dan terkini.</p>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="timeline-content">
                                    <h4>Modul Laporan Keuangan</h4>
                                    <p>Buat dan lihat laporan keuangan untuk analisis dan pelaporan.</p>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-icon"><i class="bi bi-journal-richtext"></i></div>
                                <div class="timeline-content">
                                    <h4>Modul Penutupan Buku</h4>
                                    <p>Lakukan penutupan buku keuangan pada akhir periode akuntansi.</p>
                                </div>
                            </li>
                            <li class="timeline-inverted">
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

        <div class="row mt-5">
            <div class="col text-center">
                <h2 class="mb-4">Modul Aplikasi</h2>
            </div>
        </div>

        <div class="row">
            @foreach ([['Akun', 'Kelola akun dan profil pengguna Anda.', 'bi-person-circle'], ['Pencatatan Transaksi', 'Catat semua transaksi keuangan Anda dengan mudah dan cepat.', 'bi-journal-text'], ['Jurnal Umum dan Khusus', 'Kelola jurnal umum dan jurnal khusus Anda dengan sistematis dan efisien.', 'bi-journal-check'], ['Buku Besar', 'Lihat dan kelola buku besar Anda untuk memantau saldo setiap akun.', 'bi-book'], ['Neraca Saldo', 'Lihat dan kelola neraca saldo Anda untuk memastikan semua akun seimbang.', 'bi-bar-chart'], ['Penyesuaian', 'Lakukan penyesuaian keuangan Anda untuk memastikan data akurat dan terkini.', 'bi-pencil-square'], ['Laporan Keuangan', 'Buat dan lihat laporan keuangan untuk analisis dan pelaporan.', 'bi-file-earmark-text'], ['Penutupan Buku', 'Lakukan penutupan buku keuangan pada akhir periode akuntansi.', 'bi-journal-richtext'], ['Entri Pembalikan', 'Kelola entri pembalikan keuangan Anda untuk mengoreksi kesalahan sebelumnya.', 'bi-arrow-repeat']] as $module)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <i class="bi {{ $module[2] }} display-4 mb-3"></i>
                            <h5 class="card-title">{{ $module[0] }}</h5>
                            <p class="card-text">{{ $module[1] }}</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Timeline Styles */
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
            font-size: 2em;
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

        .timeline>li.timeline-inverted .timeline-icon {
            left: auto;
            right: 50%;
        }

        .timeline>li .timeline-content h4 {
            margin-top: 0;
            color: #343a40;
        }

        .timeline>li .timeline-content p {
            margin-bottom: 0;
        }

        .card-body .bi {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #007bff;
        }

        /* Additional Styling */
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
    </style>
@endsection
