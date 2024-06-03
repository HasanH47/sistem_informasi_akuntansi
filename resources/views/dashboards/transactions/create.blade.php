@extends('layouts.dashboard.app')

@section('title', 'Tambah Transaksi | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.transactions.index') }}">Transaksi</a></li>
            <li class="breadcrumb-item active">Tambah Transaksi</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah Transaksi</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboards.transactions.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="akun" class="form-label">Akun</label>
                                    <select name="account" class="form-select @error('account') is-invalid @enderror"
                                        id="subtype">
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($accounts as $account)
                                            <option value="{{ $account->id }}">{{ $account->account_code }} -
                                                {{ $account->account_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('account')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="namaAkun" class="form-label">Tanggal</label>
                                    <input type="date"
                                        class="form-control @error('transaction_date') is-invalid @enderror"
                                        name="transaction_date" id="tanggal" value="{{ old('transaction_date') }}">
                                    @error('transaction_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsiTransaksi" class="form-label">Keterangan</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                                        rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" name="amount" id="nominal"
                                            class="form-control @error('amount') is-invalid @enderror"
                                            value="{{ old('amount') }}">
                                    </div>
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <script>
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function updateInputValue(event) {
            let input = event.target;
            let value = input.value.replace(/\./g, '');
            if (!isNaN(value) && value.length > 0) {
                input.value = formatNumber(value);
            }
        }

        document.getElementById('nominal').addEventListener('input', updateInputValue);
    </script>
@endsection
