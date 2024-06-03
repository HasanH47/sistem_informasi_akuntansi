@extends('layouts.app')

@section('title', 'Homepage | Sistem Informasi Akuntansi')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4">Selamat Datang di SIA (Sistem Informasi Akuntansi)</h1>
            <p class="lead">Kelola Keuangan Anda dengan Mudah dan Efisien</p>
            <hr class="my-4">
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                <h2 class="mb-4">Modul Aplikasi</h2>
            </div>
        </div>

        <div class="row">
            @foreach ([['Akun', 'Kelola akun Anda.', 'bi-person-circle'], ['Pencatatan Transaksi', 'Catat semua transaksi keuangan Anda dengan mudah dan cepat.', 'bi-journal-text'], ['Jurnal Umum dan Khusus', 'Kelola jurnal umum dan jurnal khusus Anda dengan sistematis dan efisien.', 'bi-journal-check'], ['Buku Besar', 'Lihat dan kelola buku besar Anda untuk memantau saldo setiap akun.', 'bi-book'], ['Neraca Saldo', 'Lihat dan kelola neraca saldo Anda untuk memastikan semua akun seimbang.', 'bi-bar-chart'], ['Penyesuaian', 'Lakukan penyesuaian keuangan Anda untuk memastikan data akurat dan terkini.', 'bi-pencil-square'], ['Laporan Keuangan', 'Buat dan lihat laporan keuangan untuk analisis dan pelaporan.', 'bi-file-earmark-text'], ['Penutupan Buku', 'Lakukan penutupan buku keuangan pada akhir periode akuntansi.', 'bi-journal-richtext'], ['Entri Pembalikan', 'Kelola entri pembalikan keuangan Anda untuk mengoreksi kesalahan sebelumnya.', 'bi-arrow-repeat']] as $module)
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
