@extends('layouts.dashboard.app')

@section('title', 'Detail Akun | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Detail Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.accounts.index') }}">Akun</a></li>
            <li class="breadcrumb-item active">{{ $account->account_name }}</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Detail Akun
                    {{-- <a href="{{ route('dashboards.accounts.edit', $account->id) }}" class="btn btn-primary float-right">
                        <i class="bi bi-pencil-square"></i> Edit Akun
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Kode Akun:</div>
                        <div class="col-md-9">{{ $account->account_code }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Nama Akun:</div>
                        <div class="col-md-9">{{ $account->account_name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Tipe Akun:</div>
                        <div class="col-md-9">
                            <span
                                class="badge-pill badge-{{ $account->account_type == 'asset' ? 'primary' : ($account->account_type == 'liability' ? 'success' : ($account->account_type == 'equity' ? 'danger' : ($account->account_type == 'revenue' ? 'warning' : ($account->account_type == 'expense' ? 'info' : 'warning')))) }}">{{ strtoupper($account->account_type) }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Subtipe Akun:</div>
                        <div class="col-md-9">{{ $account->subtype ? $account->subtype : '-' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Deskripsi Akun:</div>
                        <div class="col-md-9">{{ $account->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
