@extends('layouts.dashboard.app')

@section('title', 'Tambah Jurnal | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Jurnal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.journals.index') }}">Jurnal</a></li>
            <li class="breadcrumb-item active">Tambah Jurnal</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah Jurnal</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboards.journals.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="account_id" id="account_id">
                                <input type="hidden" name="amount" id="amount">
                                <div class="mb-3">
                                    <label for="akun" class="form-label">Transaksi</label>
                                    <select name="transaction_id"
                                        class="form-select @error('transaction_id') is-invalid @enderror"
                                        id="transaction_id">
                                        <option value="" disabled selected>Pilih Transaksi</option>
                                        @foreach ($transactions as $transaction)
                                            <option value="{{ $transaction->id }}"
                                                data-code="{{ $transaction->account_code }}"
                                                data-name="{{ $transaction->account_name }}"
                                                data-date="{{ $transaction->transaction_date }}"
                                                data-description="{{ $transaction->description }}"
                                                data-amount="{{ number_format($transaction->amount, 2, '.', '.') }}"
                                                data-account-id="{{ $transaction->account_id }}">
                                                {{ $transaction->account_code }}
                                                {{ $transaction->account_name }} -
                                                {{ number_format($transaction->amount, 2, '.', '.') }}</option>
                                        @endforeach
                                    </select>
                                    @error('account')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="transactionDetails" style="display: none;">
                                    <p><strong>Kode Akun:</strong> <span id="accountCode"></span></p>
                                    <p><strong>Nama Akun:</strong> <span id="accountName"></span></p>
                                    <p><strong>Tanggal Transaksi:</strong> <span id="transactionDate"></span></p>
                                    <p><strong>Deskripsi:</strong> <span id="description"></span></p>
                                    <p><strong>Nominal:</strong> <span id="amount"></span></p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="entry_type" id="debit"
                                            value="debit" checked>
                                        <label class="form-check-label" for="debit">Debit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="entry_type" id="credit"
                                            value="credit">
                                        <label class="form-check-label" for="credit">Kredit</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('transaction_id').addEventListener('change', function() {
            var option = this.options[this.selectedIndex];
            document.getElementById('accountCode').innerText = option.getAttribute('data-code');
            document.getElementById('accountName').innerText = option.getAttribute('data-name');
            document.getElementById('transactionDate').innerText = option.getAttribute('data-date');
            document.getElementById('description').innerText = option.getAttribute('data-description');
            document.getElementById('amount').innerText = option.getAttribute('data-amount');
            document.getElementById('account_id').value = option.getAttribute('data-account-id');
            document.getElementById('amount').value = option.getAttribute('data-amount');
            document.getElementById('transactionDetails').style.display = 'block';
        });
    </script>
@endsection
