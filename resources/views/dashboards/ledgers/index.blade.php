@extends('layouts.dashboard.app')

@section('title', 'Buku Besar | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Daftar Buku Besar</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Buku Besar</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table mr-1"></i> Data Buku Besar
                </div>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('dashboards.ledgers.search') }}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="account_id" class="form-label">Akun</label>
                            <select class="form-control @error('account_id') is-invalid @enderror" id="account_id"
                                name="account_id">
                                <option value="">Pilih Akun</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->account_name }}
                                        ({{ $account->account_code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="period_type" class="form-label">Periode</label>
                            <select class="form-control @error('period_type') is-invalid @enderror" id="period_type"
                                name="period_type">
                                <option value="range">Rentang Tanggal</option>
                                <option value="period">Periode</option>
                                <option value="month">Bulan</option>
                            </select>
                            @error('period_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3" id="period-fields">
                        <!-- Rentang Tanggal -->
                        <div class="col-md-4 range-fields">
                            <label for="start_date" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                id="start_date" name="start_date">
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 range-fields">
                            <label for="end_date" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                id="end_date" name="end_date">
                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Periode -->
                        <div class="col-md-4 period-fields d-none">
                            <label for="period_value" class="form-label">Periode</label>
                            <select class="form-control @error('period_value') is-invalid @enderror" id="period_value"
                                name="period_value">
                                <option value="1_day">1 Hari</option>
                                <option value="1_week">1 Minggu</option>
                                <option value="1_month">1 Bulan</option>
                            </select>
                            @error('period_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bulan -->
                        <div class="col-md-4 month-fields d-none">
                            <label for="month_value" class="form-label">Bulan</label>
                            <input type="month" class="form-control @error('month_value') is-invalid @enderror"
                                id="month_value" name="month_value">
                            @error('month_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>

                @if (isset($journalEntries) && count($journalEntries) > 0)
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h3>Nama Akun: {{ $accountName }}</h3>
                        <h3>Kode Akun: {{ $accountCode }}</h3>
                    </div>
                    <table class="table table-hover table-striped table-bordered mt-4">
                        <thead style="vertical-align: middle; text-align: center;">
                            <tr>
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">Keterangan</th>
                                <th rowspan="2">Debit</th>
                                <th rowspan="2">Kredit</th>
                                <th colspan="2">Saldo</th>
                            </tr>
                            <tr>
                                <th>Debit</th>
                                <th>Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $debitBalance = 0;
                                $creditBalance = 0;
                            @endphp
                            @foreach ($journalEntries as $entry)
                                @php
                                    if ($entry->debit > 0) {
                                        $debitBalance += $entry->debit;
                                    } else {
                                        $creditBalance += $entry->credit;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $entry->entry_date }}</td>
                                    <td>{{ $entry->transaction->description }}</td>
                                    <td>Rp{{ number_format($entry->debit, 2, ',', '.') }}</td>
                                    <td>Rp{{ number_format($entry->credit, 2, ',', '.') }}</td>
                                    <td>Rp{{ number_format($debitBalance - $creditBalance > 0 ? $debitBalance - $creditBalance : 0, 2, ',', '.') }}
                                    </td>
                                    <td>Rp{{ number_format($creditBalance - $debitBalance > 0 ? $creditBalance - $debitBalance : 0, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif(isset($journalEntries))
                    <p class="mt-4">Tidak ada data buku besar.</p>
                @endif
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const periodTypeSelect = document.getElementById('period_type');
            const periodFields = document.getElementById('period-fields');
            const rangeFields = periodFields.querySelectorAll('.range-fields');
            const periodFieldsElement = periodFields.querySelectorAll('.period-fields');
            const monthFields = periodFields.querySelectorAll('.month-fields');

            periodTypeSelect.addEventListener('change', function() {
                const periodType = this.value;
                rangeFields.forEach(field => field.classList.add('d-none'));
                periodFieldsElement.forEach(field => field.classList.add('d-none'));
                monthFields.forEach(field => field.classList.add('d-none'));

                if (periodType === 'range') {
                    rangeFields.forEach(field => field.classList.remove('d-none'));
                } else if (periodType === 'period') {
                    periodFieldsElement.forEach(field => field.classList.remove('d-none'));
                } else if (periodType === 'month') {
                    monthFields.forEach(field => field.classList.remove('d-none'));
                }
            });

            periodTypeSelect.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
