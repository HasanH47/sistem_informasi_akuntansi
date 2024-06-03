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
                                <div class="mb-3">
                                    <label for="transaction" class="form-label">Transaksi</label>
                                    <select name="transaction"
                                        class="form-select @error('transaction') is-invalid @enderror">
                                        <option value="" disabled selected>Pilih Transaksi</option>
                                        @foreach ($transactions as $transaction)
                                            @if (!in_array($transaction->id, $selectedTransactions))
                                                <option value="{{ $transaction->id }}">{{ $transaction->description }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('transaction')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="transaction-details" style="display: none;">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="date" id="date" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control" name="amount" id="amount" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="account" class="form-label">Akun</label>
                                        <input type="text" class="form-control" name="account" id="account" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="debit" class="form-label">Debit</label>
                                        <input type="radio" name="debit_credit" id="debit" value="debit">
                                    </div>
                                    <div class="mb-3">
                                        <label for="credit" class="form-label">Credit</label>
                                        <input type="radio" name="debit_credit" id="credit" value="credit">
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
@endsection

@section('scripts')
    <script>
        // Function to toggle transaction details visibility
        function toggleTransactionDetails() {
            const transactionSelect = document.getElementById('transaction');
            const transactionDetails = document.getElementById('transaction-details');

            // If transaction is selected, show transaction details
            if (transactionSelect.value !== "") {
                transactionDetails.style.display = 'block';
            } else {
                transactionDetails.style.display = 'none';
            }
        }

        // Event listener for transaction select change
        document.getElementById('transaction').addEventListener('change', toggleTransactionDetails);

        // Initially toggle transaction details visibility
        toggleTransactionDetails();
    </script>
@endsection
