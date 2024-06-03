@extends('layouts.dashboard.app')

@section('title', 'Detail Jurnal | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Detail Jurnal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.journals.index') }}">Jurnal</a></li>
            <li class="breadcrumb-item active">
                {{ $journalEntrys->account->account_code . '-' . $journalEntrys->account->account_name }}</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Detail Jurnal
                    {{-- <a href="{{ route('dashboards.accounts.edit', $account->id) }}" class="btn btn-primary float-right">
                        <i class="bi bi-pencil-square"></i> Edit Akun
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Akun:</div>
                        <div class="col-md-9">
                            {{ $journalEntrys->account->account_code . '-' . $journalEntrys->account->account_name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Tanggal:</div>
                        <div class="col-md-9">
                            {{ $journalEntrys->entry_date }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Keterangan:</div>
                        <div class="col-md-9">
                            {{ $journalEntrys->transaction->description }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Debit:</div>
                        <div class="col-md-9">
                            Rp{{ $journalEntrys->debit == null ? '-' : number_format($journalEntrys->debit, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Credit:</div>
                        <div class="col-md-9">
                            Rp{{ $journalEntrys->credit == null ? '-' : number_format($journalEntrys->credit, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
