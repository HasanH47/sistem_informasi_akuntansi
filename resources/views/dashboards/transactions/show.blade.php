@extends('layouts.dashboard.app')

@section('title', 'Detail Transaksi | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Detail Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.transactions.index') }}">Transaksi</a></li>
            <li class="breadcrumb-item active">{{ $transactions->account->account_name }}</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Detail Transaksi
                    {{-- <a href="{{ route('dashboards.accounts.edit', $account->id) }}" class="btn btn-primary float-right">
                        <i class="bi bi-pencil-square"></i> Edit Akun
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Tanggal:</div>
                        <div class="col-md-9">
                            {{ $transactions->transaction_date }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Akun:</div>
                        <div class="col-md-9">
                            {{ $transactions->account->account_code . '-' . $transactions->account->account_name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Keterangan Transaksi:</div>
                        <div class="col-md-9">{{ $transactions->description }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Nominal:</div>
                        <div class="col-md-9">Rp{{ number_format($transactions->amount, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
